<?php

/* 使用示例
$obj = new pdo_pager();
$obj->set('mysql' , $config['dbhost'] , $config['dbuser'] , $config['dbpwd'] , $config['dbname'] , 'site_article' ,  array('id','title','summary' , 'pic') , $pagesize , 3 , array('unitid' => 51 ,'state'=>1,'clmid'=>$catid),array('id','title','summary' , 'snapimg'));

$result = $obj->create_page(); // 获取查询的数据 $result 得到的是一个关联数组
$pager = $obj->get_pager();   // 分页条内容

$pagebar = $pager[4];
$pagebar= str_replace('<a', '<li><a', $pagebar);
$pagebar= str_replace('</a>', '</a></li>', $pagebar);
$pagebar= str_replace('[', '', $pagebar);
$pagebar = str_replace(']', '', $pagebar);
$pagebar=  '<div class="pagination pagination-small pagination-centered"><ul>'.$pagebar.'</ul></div>';  //[1]、[2]、[3]
*/


class pdo_pager{
/* 变量定义部分 begin */

        /* pdo数据源 */
        private $db_driver = '';
        private $db_host = '';
        private $db_user = '';
        private $db_password = '';
        private $db_char = '';
        private $db_name = '';
        private $db_table = '';
        private $db_table_field = '';
        private $db = '';                //数据库连接句柄

        /* 分页显示参数设置 */
        private $page_size = 0;                //每页显示的记录数目
        private $link_num = 0;                //显示页码链接的数目

        private $page = 1;                //页码
        private $records = 0;                //表中记录总数
        private $page_count = 0;        //总页数
        private $pagestring = '';        //前后分页链接字符串
        private $page_link = '';        //页码链接字符串
        private $page_select = '';        //表单跳转页字符串
        private $page_jump = '';        //text筐输入页码跳转
        private $filelds  = array();   //需要查询的字段；
        private $cond = array() ;  //查找的条件

/* 变量定义部分 end */

/* 函数定义(类方法) begin */

        function __construct(){

        }

        /* 设置分页信息 begin */
        public function set($db_driver,
                        $db_host,
                        $db_user,
                        $db_password,
                        $db_name,
                        $db_table,
                        $db_table_field,
                        $page_size,
                        $link_num,
                        $cond  = array(),
                        $filelds = array()
                        ){
                /* db参数设置 begin */
                $this->db_driver = $db_driver;                //db驱动
                $this->db_host = $db_host;                //dbms地址
                $this->db_user = $db_user;                //dbms帐户
                $this->db_password = $db_password;        //dbms密码
                $this->db_name = $db_name;                //db名称
                $this->db_table = $db_table;                //表名
                $this->db_table_field = $db_table_field;//字段数组，
                                                        //将要显示的字段名称
                                                        //写入该数组
                /* db参数设置 end */

                /* 分页参数设置 begin */
                $this->page_size = $page_size;                //每页显示记录的数目
                $this->link_num = $link_num;                //显示翻页链接的数目
                $this->cond = $cond;
                $this->filelds = $filelds;
                /* 分页参数设置 end */
        }
        /* 设置分页信息 end*/
        
        /* 获取分页链接数据 begin */
        public function get(){
                $page_data[0] = $this->records;                //表中记录的总数
                $page_data[1] = $this->page_count;        //总页数
                $page_data[2] = $this->page;                //当前页码
                $page_data[3] = $this->pagestring;        //'首页'、'上一页'、
                                                        //'下一页'、//'尾页'
                                                        //－－链接样式

                $page_data[4] = $this->page_link;        //[1]、[2]、[3]
                                                        //－－链接样式

                $page_data[5] = $this->page_select;        //表单翻页样式
                $page_data[6] = $this->page_jump;        //跳转的指定页样式
                return $page_data;
        }
        /* 获取分页链接数据 end */

        /* 连接数据库 begin */
        private function db_conn(){
                try{
                        $this->db = new pdo(
                                "$this->db_driver:dbname=$this->db_name;
                                host=$this->db_host;charset=$this->db_char",
                                "$this->db_user",
                                "$this->db_password"
                        );
                        return $this->db;
                } catch(pdoexception $e) {
                        die($e->getmessage());
                }
        }
        /* 连接数据库 end */

        /* 页码处理 begin */
        private function set_page(){
                if (isset($_REQUEST['page'])) {
                        $this->page = intval($_REQUEST['page']);
                } else {
                        $this->page = 1;
                }
        }
        /* 页码处理 end */

        /* 获取db中记录的数目 begin */
        private function get_records(){
                $sql = "select count(*) from $this->db_table";
                if(count($this->cond)){
                        $sql .=  ' where ';
                        $tmp = array();
                        foreach ($this->cond as $key => $value) {
                                $tmp[] = " $key = $value "; 
                        }
                        $sql .= implode('and' , $tmp);
                }
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                while ($f = $stmt->fetch()) {
                        $this->records = $f[0];
                }
        }
        /* 获取db中记录的数目 end */

        /* 建立翻页链接字符串 begin */
        private function page_link(){
                /* 前后页链接字符串 begin */
                $last_page = 1;
                if ($this->page == 1) {
                        //首页,无链接
                        $this->pagestring .='第一页|上一页';
                } else {
                        //不为首页，有链接
                        $this->pagestring .='<a href=?page=1>第一页</a>|
                        <a href=?page='.($this->page-1).'>上一页</a>';
                        
                }
                if ($this->page==$this->page_count || $this->page_count==0) {
                        //末页,无链接
                        $this->pagestring .='下一页|尾页';
                } else {
                        //非末页，有链接
                        $this->pagestring .='<a href=?page='.($this->page+1).'>
                        下一页</a>|<a href=?page='.$this->page_count.'>尾页</a>';
                }
                /* 前后页链接字符串 end */

                /* 页码链接字符串 begin */
                for ($i=$this->page;$i<=$this->page+$this->link_num-1;$i++) {
                        if ($i<=$this->page_count) {
                                $this->page_link .= '<a href=?page='.$i.'>
                                ['.$i.']</a> ';
                                $last_page = $i;
                        }
                }
                if ($i-$this->link_num-1 < 1) {
                                $front_page = 1;
                } else {
                                $front_page = $i - $this->link_num - 1;
                }
                if ($last_page == $this->page_count) {
                                $back_page = $last_page;
                } else {
                                $back_page = $last_page+1;
                }
                $this->page_link = '<a href=?page='.$front_page.'><<</a>'.' '.
                        $this->page_link.' '.'<a href=?page='.$back_page.'>>>
                        </a>';
                /* 页码链接字符串 end */

                /* select页码 begin */
                $this->page_select = "<form action='' method=post>
                        <select name=page>";
                for ($i = 1;$i <= $this->page_count;$i++) {
                        if ($i == $this->page) {
                                $this->page_select .= "<option selected>$i
                                </option>";
                        } else {
                                $this->page_select .= "<option>$i</option>";
                        }
                }
                $this->page_select .= "</select><input type=submit value=go>
                        </form>";
                /* select页码 end */

                /* input跳转表单begin */
                $this->page_jump = "<form action='' method=post><input 
                        type=text size=1 name=page value=$this->page><input 
                        type=submit value=go>";
                /* input跳转表单end */

        }
        /* 建立翻页链接字符串 end */

        /* 获取数据 begin */
        function fetch_data(){
                if ($this->records) {
                        $fs = array();
                        foreach($this->filelds as $v){
                                $fs[] = $v;
                        }
                        $filelds = implode(',', $fs);

                        $wh = '';
                         if(count($this->cond)){
                                $wh .=  ' where ';
                                $tmp = array();
                                foreach ($this->cond as $key => $value) {
                                        $tmp[] = " $key = $value "; 
                                }
                                $wh .= implode('and' , $tmp);
                        }
                        $sql = "select $filelds from $this->db_table $wh limit ".($this->page-1)*$this->page_size.",$this->page_size";
                        $this->db->query('set names utf8;');
                        $stmt = $this->db->prepare($sql);
                        $stmt->execute();
                        $d = $stmt->fetchAll();
                        return $d;
                        // // return $stmt->fetchAll();
                        // echo "<center><table border=1 width=60%><tr>";
                        // /* 取字段名称 begin */
                        // $field_count = count($this->db_table_field);
                        // // for($i = 0;$i < $field_count;$i++){
                        // //         $field_name = $this->db_table_field[$i];
                        // //         echo "<td><center><b>$field_name</b></center>
                        // //                 </td>";
                        // // }
                        // // echo "</tr>";
                        // /* 取字段名称 end */
                        // /* 获取数据 begin */
                        // while($f = $stmt->fetch()){
                        //         echo "<tr>";
                        //         for($i = 0;$i < $field_count;$i++){
                        //                 $field_name = $this->db_table_field[$i];
                        //                 $field_value = $f["$field_name"];
                        //                 echo "<td><center>$field_value</center>
                        //                         </td>";
                        //         }
                        //         echo "</tr>";
                        // }
                        // /* 获取数据 end */
                        // echo "</table></center>";
                }
        }
        /* 获取数据 end */

        /* 建立分页 begin */
        public function create_page(){
                $this->db_conn();
                $this->set_page();
                $this->get_records();
                $this->page_count = ceil($this->records/$this->page_size);
                $this->page_link();
                $this->fetch_data();
        }
        /* 建立分页 end */

        function __destruct(){

        }
/* 函数定义(类方法) end */
}