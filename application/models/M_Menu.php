<?php

/**
 *
 * Created at 2022-06-23 15:40:05
 * Updated at
 *
 */

class M_Menu extends CI_Model
{
	private $table = 'tm_menu';
	public function __construct()
	{
		parent::__construct();
		$this->sess_auth = $this->session->userdata('auth');
	}


	public function save()
	{
		$is_success = false;
		$dataJson = $this->input->post('dataJson');

		$new_data = $this->objectToArray($dataJson);
		// print_r($new_data); exit;
		$old_data2 = $this->parseJsonArray($new_data);

		$new_data = $old_data2;

		$dataSave = array('insert' => array(), 'update' => array());

		$iterate_child = 1;
		$iterate_parent = 1;
		$tgl_now = date('Y-m-d H:i:s');


		// print_r($new_data); exit;

		foreach ($new_data as $key => $val) {
			$is_children = $val['is_children'];
			$id = $val['id'];
			$parent_id = $val['parent_id'];
			$menu_name = $val['text'];
			$keterangan = $val['ket'];
			$icon = $val['icon'];
			$url = $val['url'];
			$index = $val['index'];

			if ($is_children) {
				$is_slider = '1';
			} else {
				$is_slider = '0';
			}


			if ($parent_id != 0) {
				// child menu

				$dataArr = array(
					'parent_id' => $parent_id,
					'name' => $menu_name,
					'keterangan' => $keterangan,
					'icon' => $icon,
					'url' => $url,
					// 'id' => $id,
					// 'sort_no' => $iterate_child,
					'sort_no' => $index,
					// 'slider' => '0',
					'slider' => $is_slider,
				);

				if (!empty($id)) {
					$dataArr['id'] = $id;
					$dataArr['date_update'] = $tgl_now;
					array_push($dataSave['update'], $dataArr);
				} else {
					$dataArr['date_create'] = $tgl_now;
					array_push($dataSave['insert'], $dataArr);
				}

				// $iterate_child++;
			} else {
				// parent menu

				$dataArr = array(
					'parent_id' => $parent_id,
					'name' => $menu_name,
					'keterangan' => $keterangan,
					'icon' => $icon,
					'url' => $url,
					// 'id' => $id,
					// 'sort_no' => $iterate_parent,
					'sort_no' => $index,
					'slider' => $is_slider,
				);

				if (!empty($id)) {
					$dataArr['id'] = $id;
					$dataArr['date_update'] = $tgl_now;
					array_push($dataSave['update'], $dataArr);
				} else {
					$dataArr['date_create'] = $tgl_now;
					array_push($dataSave['insert'], $dataArr);
				}

				// $iterate_parent++;
				// $iterate_child = 1;
			}
		}

		// echo "<pre>";
		// print_r($dataSave);
		// // print_r($new_data);
		// exit();

		$msgCustom = array(
			'update' => array(
				'success' => 'Data Menu Berhasil di Update',
				'error'   => 'Data Menu Gagal di Update',
			),
			'insert' => array(
				'success' => 'Data Menu Berhasil ditambah',
				'error'   => 'Data Menu Gagal ditambah',
			),
		);

		$this->db->trans_begin();
		if (!empty($dataSave['update'])) {
			$this->db->update_batch($this->table, $dataSave['update'], 'id');
		}

		if (!empty($dataSave['insert'])) {
			$this->db->insert_batch($this->table, $dataSave['insert']);
		}

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$is_success = false;
		} else {
			$this->db->trans_commit();
			$is_success = true;
		}



		if ($is_success) {
			$update = true;
		} else {
			$update = false;
		}

		if (isset($insert)) {
			if ($insert) {
				if (!empty($msgCustom)) {
					$r = array('success' => true, 'msg' => $msgCustom['insert']['success']);
				} else {
					$r = array('success' => true, 'msg' => 'Berhasil');
				}
			} else {
				if (!empty($msgCustom)) {
					$r = array('success' => false, 'msg' => $msgCustom['insert']['error']);
				} else {
					$r = array('success' => false, 'msg' => 'Gagal');
				}
			}
		} elseif (isset($update)) {
			if ($update) {
				if (!empty($msgCustom)) {
					$r = array('success' => true, 'msg' => $msgCustom['update']['success']);
				} else {
					$r = array('success' => true, 'msg' => 'Berhasil');
				}
			} else {
				if (!empty($msgCustom)) {
					$r = array('success' => false, 'msg' => $msgCustom['update']['error']);
				} else {
					$r = array('success' => false, 'msg' => 'Gagal');
				}
			}
		}

		if (!empty($result)) {
			$r = array_merge($r, $result);
		}

		die(json_encode($r));
	}

	public function getJson()
	{
		$new_data = array();

		$this->db->select('a.id, a.parent_id, a.`name` AS text, a.icon, a.slider, a.url, a.sort_no, a.keterangan as ket, a.is_active');
		$this->db->from($this->table . ' as a');
		$this->db->where('a.is_active', '1');
		$this->db->order_by('a.sort_no', 'asc');
		$get = $this->db->get();

		if ($get) {
			$data = $get->result_array();

			// print_r($data);exit;

			if (!empty($data)) {
				foreach ($data as $key => $val) {
					if (empty($val['icon'])) {
						$val['icon'] = 'empty';
					}
					$new_data[] = $val;
				}
				// print_r($new_data);exit;


				$old_data = $this->buildTree($new_data);
				$new_data = $old_data;
				unset($old_data);
			}
		}

		$r = array('success' => (!empty($new_data) ? true : false), 'data' => $new_data);
		die(json_encode($r));
	}


	public function printMenu()
	{
		// Select all entries from the menu table

		$list_menu_arr = array();
		$list_menu_parent_arr = array();

		// get all data menu by roles
		// $this->db->select('menu');
		// $this->db->from(tbl_roles);
		// $this->db->where('id', $this->id_role);

		// $role = $this->db->get()->result_array();

		// foreach ($role as $row) {
		// 	$rolez = unserialize($row['menu']);
		// 	foreach ($rolez as $keyx => $rowx) {
		// 		$list_menu_parent_arr[] = $rowx['parent_id'];
		// 		$list_menu_arr[] = $rowx['id_menu'];
		// 	}
		// }

		$this->db->select('a.*');
		$this->db->from('tm_role as a');
		$this->db->where('a.id_role', $this->sess_auth['role']);
		$this->db->limit(1);
		$data_role = $this->db->get()->result_array();

		$data_role = $data_role[0];

		$this->db->select('a.id, a.parent_id, a.`name`, a.icon, a.slider, a.url, a.sort_no, a.keterangan, a.is_active');
		$this->db->from($this->table . ' as a');
		// $this->db->order_by('a.parent_id', 'asc');
		$this->db->where('a.is_active', '1');
		$this->db->where_in('a.id', $data_role['list_menu'], false);

		// if (!empty($list_menu_parent_arr)) {
		// 	$this->db->where_in('a.idz', $list_menu_arr);
		// }

		// if (!empty($list_menu_parent_arr)) {
		// 	$this->db->or_group_start();
		// 	$this->db->where_in('a.id', array_unique($list_menu_parent_arr));
		// 	$this->db->group_end();
		// }

		$this->db->order_by('a.sort_no', 'asc');

		$get  = $this->db->get();
		$data = $get->result_array();

		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$result[] = $value;
			}

			// Create a multidimensional array to conatin a list of items and parents
			$menu = array(
				'items'   => array(),
				'parents' => array(),
			);

			// Builds the array lists with data from the menu table
			foreach ($result as $items) {
				// Creates entry into items array with current menu item id ie. $menu['items'][1]
				$menu['items'][$items['id']] = $items;
				// Creates entry into parents array. Parents array contains a list of all items with children
				$menu['parents'][$items['parent_id']][] = $items['id'];
			}

			echo $this->buildMenu(0, $menu);
		}
	}

	/* ---------------------------- Private Function ---------------------------- */


	private function parseJsonArray($jsonArray, $parentID = 0)
	{
		$parentIndex = 'parent_id';
		$idIndex = 'id';

		$return = array();

		// print_r($jsonArray);exit;

		$is_multiArr = $this->is_multidimensional($jsonArray);

		if ($is_multiArr) {
			foreach ($jsonArray as $key => $subArray) {
				$is_children = false;
				$returnSubSubArray = array();

				if (isset($subArray['children'])) {
					$is_children = true;
					$returnSubSubArray = $this->parseJsonArray($subArray['children'], $subArray[$idIndex]);
				}

				// $return[] = $subArray;
				$return[] = array(
					$idIndex => $subArray[$idIndex],
					$parentIndex => $parentID,
					'is_children' => $is_children,
					'text' => $subArray['text'],
					'icon' => $subArray['icon'],
					'url' => $subArray['url'],
					'ket' => $subArray['ket'],
					'index' => $key,
				);

				$return   = array_merge($return, $returnSubSubArray);

				// unset($subArray[$idIndex], $subArray[$parentIndex], $subArray['is_children']);
			}
		} else {
			$return[] = array(
				$idIndex => $jsonArray[$idIndex],
				$parentIndex => $parentID,
				'is_children' => false,
				'text' => $jsonArray['text'],
				'icon' => $jsonArray['icon'],
				'url' => $jsonArray['url'],
				'ket' => $jsonArray['ket'],
				'index' => 0,
			);
		}



		// print_r($return); exit;
		return $return;
	}

	private function objectToArray($dataJson)
	{
		$data = array();

		foreach ($dataJson as $key => $value) {
			# Remove ' from value
			$value = str_replace("'", '', $value);

			# Set value as array not as array object from json_encode
			$value = (array) json_decode($value, true);

			# Pushing into $old_data
			$data = $value;
		}

		return $data;
	}

	private function buildTree($data = array(), $parentId = 0, $parentIndex = 'parent_id', $idIndex = 'id')
	{
		$branch = array();

		foreach ($data as $element) {
			if ($element[$parentIndex] == $parentId) {
				$children = $this->buildTree($data, $element[$idIndex], $parentIndex, $idIndex);

				if ($children) {
					$element['children'] = $children;
				}

				$branch[] = $element;
			}
		}

		return $branch;
	}


	private function buildMenu($parent, $menu)
	{
		// Menu builder function, parentId 0 is the root
		// reff : https://stackoverflow.com/a/39824933/10351006
		// Template Admin LTE 3
		// URL Manual - Redirect Page

		$output = "";
		$icon_default = "fas fa-th";
		$base_url = base_url();

		if (isset($menu['parents'][$parent])) {
			foreach ($menu['parents'][$parent] as $itemId) {
				$link_url = (!empty($menu['items'][$itemId]['url']) ? $menu['items'][$itemId]['url']  : '');
				$icon_txt = 'nav-icon ' . (!empty($menu['items'][$itemId]['icon']) ? $menu['items'][$itemId]['icon'] : $icon_default);

				// $link_txt = 'href="javascript:void(0);"'.(!empty($menu['items'][$itemId]['url']) ? ' onclick="toUrl(\'' . $link_url . '\');"' : '');
				$link_txt = 'href="' . $base_url . $link_url . '"';
				$menu_name =  $menu['items'][$itemId]['name'];

				if (!isset($menu['parents'][$itemId])) {
					if ($menu['items'][$itemId]['parent_id'] == 0) {
						// jika parent_id = 0

						$output .= '<li class="nav-item">';
						$output .= '<a class="nav-link" ' . $link_txt . ' data_menu="' . $link_url . '">';
						$output .= '<i class="' . $icon_txt . '"></i>';
						$output .= '<p>' . $menu_name . '</p>';
						$output .= '</a>';
						$output .= '</li>';
					} else {
						// if (!empty($menu['items'][$itemId]['icon'])) {
						// 	$output .= '<li style="margin-left: -45px;">';
						// } else {
						// 	$output .= '<li style="margin-left: -40px;">';
						// }

						$output .= '<li class="nav-item">';
						$output .= '<a class="nav-link" ' . $link_txt . ' data_menu="' . $link_url . '">';
						$output .= '<i class="' . $icon_txt . '"></i>';
						$output .= '<p>' . $menu_name . '</p>';
						$output .= '</a>';
						$output .= '</li>';
					}
				}

				if (isset($menu['parents'][$itemId])) {
					// multi-level

					$output .= '<li class="nav-item">';
					$output .= '<a href="javascript:void(0);" class="nav-link">';
					$output .= '<i class="' . $icon_txt . '"></i> <p>' . $menu_name . '<i class="right fas fa-angle-left"></i></p></a>';
					$output .= '<ul class="nav nav-treeview">';
					$output .= $this->buildMenu($itemId, $menu);

					$output .= '</ul>';
					$output .= '</li>';
				}
			}
		}

		return $output;
	}

	private function is_multidimensional(array $array)
	{
		return count($array) !== count($array, COUNT_RECURSIVE);
	}


	// end of class
}
