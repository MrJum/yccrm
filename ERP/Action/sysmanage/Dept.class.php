<?php
/*
 *
 * sysmanage.Depth  部门管理   
 *
 * =========================================================
 * 零起飞网络 - 专注于网站建设服务和行业系统开发
 * 以质量求生存，以服务谋发展，以信誉创品牌 !
 * ----------------------------------------------
 * @copyright	Copyright (C) 2017-2018 07FLY Network Technology Co,LTD (www.07FLY.com) All rights reserved.
 * @license    For licensing, see LICENSE.html or http://www.07fly.top/crm/license
 * @author ：kfrs <goodkfrs@QQ.com> 574249366
 * @version ：1.0
 * @link ：http://www.07fly.top 
 */	

class Dept extends Action {
	private $cacheDir = ''; //缓存目录
	private $auth;
	public function __construct() {
		$this->auth = _instance( 'Action/sysmanage/Auth' );
	}

	public function dept() {
		$sql	= "select * from fly_sys_dept order by sort asc;";
		$list 	= $this->C( $this->cacheDir )->findAll( $sql );
		return $list;
	}
	
	//得到数形参数
	function getTree( $data, $pId=0,$level=0) {
		$tree = '';
		foreach ( $data as $k => $v ) {
			if ( $v[ 'parentID' ] == $pId ) { //父亲找到儿子
				$v[ 'children' ] = $this->getTree( $data, $v[ 'id' ], $level + 1);
				$v[ 'level' ] =  $level + 1;
				$tree[] = $v;
			}
		}
		return $tree;
	}
	
	//输出树形参数
	function getTreeHtml($tree) {
		$html = '';
		
		foreach ( $tree as $key=>$t ) {
			$kg="";
			for($x=1;$x<$t['level'];$x++) {
				$kg .="<i class='fly-fl'>|—</i>";
			}
			if ( $t[ 'children' ] == '' ) {
				$html .= "<li><div class='fly-row lines'>
								<i class='fly-fl'>&nbsp;</i>
								<div  class='fly-col-5'>".$kg."<input type='text' name='name[]'  data-id='".$t['id']."' value='".$t['name']."' class='form-control w150 treeName'/></div>
								
								<div  class='fly-col-2 fly-fr fly-tr'>
									<a class='single_operation' data-act='add' data-id='".$t['id']."'>增加下级</a> 
									<a class='single_operation' data-act='modify' data-id='".$t['id']."'>修改</a> 
									<a class='single_operation' data-act='del' data-id='".$t['id']."'>删除</a>
								</div>
								<div  class='fly-col-2  fly-fr fly-tr'><input type='text' name='sort[]'  data-id='".$t['id']."' value='".$t['sort']."' class='form-control w100 treeSort'/></div>
							</div>
						  </li>";
			} else {
				$html .= "<li><div class='fly-row lines'>
								<lable class='fly-col-1'>[+]</lable>
								<div  class='fly-col-5'>".$kg."<input type='text' name='name[]'  data-id='".$t['id']."' value='".$t['name']."' class='form-control w150 treeName'/></div>
								<div  class='fly-col-2  fly-fr fly-tr'>
									<a class='single_operation' data-act='add' data-id='".$t['id']."'>增加下级</a> 
									<a class='single_operation' data-act='modify' data-id='".$t['id']."'>修改</a> 
									<a class='single_operation' data-act='del' data-id='".$t['id']."'>删除</a>
								</div>
								<div class='fly-col-2  fly-fr fly-tr'><input type='text' name='sort[]'  data-id='".$t['id']."' value='".$t['sort']."' class='form-control w100 treeSort'/></div>
							</div>
							";
				$html .= $this->getTreeHtml( $t[ 'children' ] );
				$html .= "</li>";
			}
		}
		return $html ? '<ul>' . $html . '</ul>': $html;
	}

	public function dept_show() {
		$list =$this->dept();
		$tree =$this->getTree($list, 0 );
		$treeHtml=$this->getTreeHtml($tree);
		$smarty = $this->setSmarty();
		$smarty->assign( array( "treeHtml" => $treeHtml) );
		$smarty->display( 'sysmanage/dept_show.html' );
	}

	public function dept_add() {
		if ( empty( $_POST ) ) {
			$pid=$this->_REQUEST('pid');
			$parentID = $this->dept_select_tree( "parentID" ,$pid);
			$smarty = $this->setSmarty();
			$smarty->assign( array( "parentID" => $parentID ) );
			$smarty->display( 'sysmanage/dept_add.html' );
		} else {
			$name = $this->_REQUEST( "name" );
			$tel = $this->_REQUEST( "tel" );
			$fax = $this->_REQUEST( "fax" );
			$parentID = $this->_REQUEST( "parentID" );
			$sort = $this->_REQUEST( "sort" );
			$visible = $this->_REQUEST( "visible" );
			$intro = $this->_REQUEST( "intro" );
			$data=array(
					'name'=>$name,
					'tel'=>$tel,
					'fax'=>$fax,
					'parentID'=>$parentID,
					'sort'=>$sort,
					'visible'=>$visible,
					'intro'=>$intro
					   );
			$this->C( $this->cacheDir )->insert('fly_sys_dept',$data );
			$this->L("Common")->ajax_json_success("操作成功");	
		}
	}
	
	public function dept_modify() {
		$id = $this->_REQUEST( "id" );
		if ( empty( $_POST ) ) {
			$sql = "select * from fly_sys_dept where id='$id'";
			$one = $this->C( $this->cacheDir )->findOne( $sql );
			$parentID = $this->dept_select_tree( "parentID", $one[ "parentID" ] );
			$smarty = $this->setSmarty();
			$smarty->assign( array( "one" => $one, "parentID" => $parentID ) ); //框架变量注入同样适用于smarty的assign方法
			$smarty->display( 'sysmanage/dept_modify.html' );
		} else {
			$name = $this->_REQUEST( "name" );
			$tel = $this->_REQUEST( "tel" );
			$fax = $this->_REQUEST( "fax" );
			$parentID = $this->_REQUEST( "parentID" );
			$sort = $this->_REQUEST( "sort" );
			$visible = $this->_REQUEST( "visible" );
			$intro = $this->_REQUEST( "intro" );

			$sql = "update fly_sys_dept set name='$name',
										   tel='$tel',
											fax='$fax',
											parentID='$parentID',
											sort='$sort',
											visible='$visible',
											intro='$intro'
					where id='$id'";
			$this->C( $this->cacheDir )->update( $sql );
			$this->L("Common")->ajax_json_success("操作成功");	
		}
	}
	
	public
	function dept_del() {
		$id = $this->_REQUEST( "id" );
		$sql = "delete from fly_sys_dept where id='$id'";
		$this->C( $this->cacheDir )->update( $sql );
		$this->location( "操作成功", "/sysmanage/Dept/dept_show/" );
	}

	public function dept_select_tree( $tag, $sid = "" ) {
		$sql = "select * from fly_sys_dept order by sort asc;";
		$list = $this->C( $this->cacheDir )->findAll( $sql );
		$tree =$this->L( "Tree" ,$list);
		//$this->L( "Tree" )->tree( $list );
		$parentID = "<select name=\"$tag\" class=\"form-control m-b\">";
		$parentID .= "<option value='0' >请您选择</option>";
		$parentID .= $tree->get_tree( 0, "<option value='\$id' \$selected>\$spacer\$name</option>\n", $sid, '', "" );
		$parentID .= "</select>";
		return $parentID;
	}
	//得到一个部门的得到下面子部门的编号
	public
	function dept_get_sub_dept( $deptID ) {
		$sql = "select id,name,parentID from fly_sys_dept where parentID='$deptID'";
		$list = $this->C( $this->cacheDir )->findAll( $sql );
		if ( !empty( $list ) ) {
			$dept_ids = $deptID . ",";
		} else {
			$dept_ids = $deptID;
		}
		foreach ( $list as $key => $row ) {
			$dept_ids .= $this->dept_get_sub_dept( $row[ "id" ] );
		}
		return $dept_ids;
	}
	//排序
	public function dept_modify_sort() {
		$id		=$this->_REQUEST('id');	
		$sort	=$this->_REQUEST('sort');	
		$upt_data=array(
					'sort'=>$this->_REQUEST( "sort" )
				 );
		$this->C( $this->cacheDir )->modify('fly_sys_dept',$upt_data,"id='$id'",true);
		$rtnArr=array('rtnstatus'=>'success','msg'=>'');
		echo json_encode($rtnArr);
	}
	//修改名称
	public
	function dept_modify_name() {
		$id		=$this->_REQUEST('id');	
		$name	=$this->_REQUEST('name');	
		$upt_data=array(
					'name'=>$this->_REQUEST( "name" )
				 );
		$this->C( $this->cacheDir )->modify('fly_sys_dept',$upt_data,"id='$id'",true);
		$rtnArr=array('rtnstatus'=>'success','msg'=>'');
		echo json_encode($rtnArr);
	}
} //
?>