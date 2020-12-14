<?php
if (!defined('DEDEINC')) {
    exit('Request Error!');
}

require_once(DEDEINC.'/channelunit.class.php');;
require_once(DEDEINC.'/typelink.class.php');

@set_time_limit(0);

class TagList
{
    var $dsql;
    var $dtp;
    var $dtp2;
    var $TypeLink;
    var $PageNo;
    var $TotalPage;
    var $TotalResult;
    var $PageSize;
    var $ListType;
    var $Fields;
    var $Tag;
    var $Templet;
    var $TagInfos;
    var $TempletsFile;

    function __construtct($keyword, $templet)
    {
        global $dsql;
        $this->Templet = $templet;
        $this->Tag = $keyword;
        $this->dsql = $dsql;
        $this->dtp = new DedeTagParse();
        $this->dtp->SetRefObj($this);
        $this->dtp->SetNameSpace("dede", "{", "}");
        $this->TypeLink = new TypeLink(0);
        $this->Fields['tag'] = $keyword; 
        $this->Fields['title'] = $keyword;
        $this->TempletsFile = '';

        // 设置一些全局参数的值
        foreach ($GLOBALS['PubFields'] as $k => $v) {
            $this->Fields[$k] = $v;
        }

        // 读取Tag信息
        if ($this->Tag != '') {
            $this->TagInfos = $this->dsql->GetOne("SELECT * FROM `#@__tagindex` WHERE tag LIKE '{$this->Tag}'");
            if (!is_array($this->TagInfos)) {
                $fullsearch = GLOBALS['cfg_phpurl']."/search.php?$keyword=".$this->Tag."searchtype=titlekeyword";
                $msg = "标签不存在<br>可直接通过关键词搜索<a href='$fullsearch'>搜索</a>"
                ShowMsg($msg, "-1");
            }
        }

        // 初始化模板
        $tempfile = $GLOBALS['cfg_basedir']
    }
}