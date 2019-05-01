
DROP TABLE IF EXISTS `tp_ad`;
CREATE TABLE `tp_ad` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `static` mediumint(1) NOT NULL DEFAULT '1' COMMENT '广告开启状态，1开启，0关闭',
  `adid` int(11) NOT NULL COMMENT '所在广告位',
  `img` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `sort` int(4) NOT NULL DEFAULT '9999'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='广告表';

DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin` (
  `id` int(8) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(32) NOT NULL,
  `create_time` varchar(60) NOT NULL,
  `last_time` varchar(60) NOT NULL,
  `static` mediumint(1) NOT NULL DEFAULT '1',
  `groupid` int(8) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tp_admin` (`id`, `username`, `password`, `create_time`, `last_time`, `static`, `groupid`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1552740822', '1552740822', 1, 4);

DROP TABLE IF EXISTS `tp_adpos`;
CREATE TABLE `tp_adpos` (
  `id` mediumint(9) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `width` int(3) DEFAULT NULL,
  `height` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='广告位表';


DROP TABLE IF EXISTS `tp_archives`;
CREATE TABLE `tp_archives` (
  `id` mediumint(8) NOT NULL,
  `title` varchar(60) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `writer` varchar(60) NOT NULL,
  `source` varchar(255) NOT NULL,
  `litpic` varchar(60) NOT NULL,
  `attr` varchar(60) NOT NULL,
  `content` text NOT NULL,
  `time` varchar(20) NOT NULL,
  `model_id` mediumint(8) NOT NULL,
  `cate_id` mediumint(8) NOT NULL,
  `click` mediumint(9) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tp_auth_group`;
CREATE TABLE `tp_auth_group` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `tp_auth_group` (`id`, `title`, `status`, `rules`) VALUES
(1,'管理员','1','20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40');


DROP TABLE IF EXISTS `tp_auth_group_access`;
CREATE TABLE `tp_auth_group_access` (
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `tp_auth_group_access` (`uid`, `group_id`) VALUES
(1,1);


DROP TABLE IF EXISTS `tp_auth_rule`;
CREATE TABLE `tp_auth_rule` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` char(20) NOT NULL DEFAULT '',
  `name` char(80) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `pid` mediumint(8) DEFAULT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '该规则是否在左侧菜单显示',
  `icon` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `tp_auth_rule` (`id`, `title`, `name`, `type`, `status`, `condition`, `pid`, `show`, `icon`) VALUES
(24, '管理员管理', 'Admin', 1, 1, '', 0, 1, 'fa-user'),
(23, '添加配置', 'Conf/add', 1, 1, '', 20, 1, NULL),
(22, '配置列表', 'Conf/lst', 1, 1, '', 20, 1, NULL),
(21, '配置管理', 'Conf/conflst', 1, 1, '', 20, 1, ''),
(20, '网站配置', 'conf', 1, 1, '', 0, 1, 'fa-briefcase'),
(25, '管理员列表', 'admin/lst', 1, 1, '', 24, 1, ''),
(26, '栏目管理', 'Cate', 1, 1, '', 0, 1, 'fa-list-ul'),
(27, '权限管理', 'AuthRule', 1, 1, '', 0, 1, ' fa-power-off'),
(28, '文档管理', 'Archives', 1, 1, '', 0, 1, 'fa-file-text'),
(29, '模型管理', 'Model', 1, 1, '', 0, 1, 'fa-maxcdn'),
(30, '模型字段管理', 'ModelField', 1, 1, '', 0, 1, 'fa-stack-exchange'),
(31, '采集管理', 'Note', 1, 1, '', 0, 1, 'fa-stack-exchange'),
(32, '广告管理', 'Adpos', 1, 1, '', 0, 1, 'fa-gamepad'),
(33, '管理员编辑', 'Admin/edit', 1, 1, '', 24, 0, ''),
(34, '管理员删除', 'Admin/ajaxdel', 1, 1, '', 24, 0, ''),
(35, '管理员添加', 'Admin/add', 1, 1, '', 24, 1, ''),
(36, '栏目列表', 'Cate/lst', 1, 1, '', 26, 1, ''),
(37, '权限列表', 'AuthRule/lst', 1, 1, '', 27, 1, ''),
(38, '用户组列表', 'AuthGroup/lst', 1, 1, '', 27, 1, ''),
(39, '文档列表', 'Archives/lst', 1, 1, '', 28, 1, ''),
(40, '模型列表', 'Model/lst', 1, 1, '', 29, 1, ''),
(41, '模型字段列表', 'ModelField/lst', 1, 1, '', 30, 1, ''),
(42, '采集列表', 'Note/lst', 1, 1, '', 31, 1, ''),
(43, '采集', 'Note/addlistrules', 1, 1, '', 31, 1, ''),
(44, '广告位管理', 'Adpos/lst', 1, 1, '', 32, 1, ''),
(45, '广告列表', 'Advertisement/lst', 1, 1, '', 32, 1, ''),
(46, '修改管理员启用状态', 'admin/changeStatic', 1, 1, '', 33, 0, ''),
(47, '修改配置', 'conf/edit', 1, 1, '', 20, 0, ''),
(48, '添加栏目', 'Cate/add', 1, 1, '', 26, 1, ''),
(49, '根据上级栏目的id改变栏目模板和所属模型', 'Cate/ajaxCateInfo', 1, 1, '', 48, 0, ''),
(50, '上传图片', 'Cate/upimg', 1, 1, '', 48, 0, ''),
(51, '撤销上传文件', 'Cate/delimg', 1, 1, '', 48, 0, ''),
(52, 'ajax修改栏目状态', 'changestate', 1, 1, '', 26, 0, ''),
(53, '栏目修改', 'Cate/edit', 1, 1, '', 26, 0, ''),
(54, '修改界面的上传文件修改', 'Cate/updateimg', 1, 1, '', 53, 0, ''),
(55, '栏目排序', 'cate/sort', 1, 1, '', 26, 0, ''),
(56, '栏目删除', 'cate/delone', 1, 1, '', 26, 0, ''),
(57, '栏目批量删除', 'cate/delsome', 1, 1, '', 56, 0, ''),
(58, '添加权限', 'AuthRule/add', 1, 1, '', 37, 1, ''),
(59, '修改权限', 'AuthRule/edit', 1, 1, '', 37, 0, ''),
(60, '权限删除', 'authrule/ajaxdel', 1, 1, '', 27, 0, ''),
(61, '用户组添加', 'authgroup/add', 1, 1, '', 27, 0, ''),
(62, '用户组开启状态', 'AuthGroup/changeStatic', 1, 1, '', 38, 0, ''),
(63, '用户组修改', 'AuthGroup/edit', 1, 1, '', 38, 0, ''),
(64, '用户组删除', 'AuthGroup/ajaxdel', 1, 1, '', 38, 0, ''),
(65, '分配权限', 'AuthGroup/power', 1, 1, '', 38, 0, ''),
(66, '文章添加', 'Archives/add', 1, 1, '', 28, 0, ''),
(67, '文章修改', 'Archives/edit', 1, 1, '', 28, 0, ''),
(68, '文章删除', 'Archives/del', 1, 1, '', 28, 0, ''),
(69, '文章图片缩略图上传', 'Archives/upimg', 1, 1, '', 66, 0, ''),
(70, '文章修改图片上传', 'Archives/updateimg', 1, 1, '', 67, 0, ''),
(71, '添加界面撤销上传文件', 'Archives/delimg', 1, 1, '', 66, 0, ''),
(72, '模型添加', 'model/add', 1, 1, '', 29, 0, ''),
(73, '模型修改', 'model/edit', 1, 1, '', 29, 0, ''),
(74, '模型删除', 'model/ajaxdel', 1, 1, '', 29, 0, ''),
(75, '模型开启状态', 'model/changestate', 1, 1, '', 29, 0, ''),
(76, '模型字段添加', 'modelfield/add', 1, 1, '', 30, 0, ''),
(77, '模型字段修改', 'ModelField/edit', 1, 1, '', 30, 0, ''),
(78, '模型字段删除', 'ModelField/ajaxdel', 1, 1, '', 30, 0, ''),
(79, '广告位添加', 'Adpos/add', 1, 1, '', 44, 1, ''),
(80, '广告位修改', 'Adpos/edit', 1, 1, '', 44, 0, ''),
(81, '广告位删除', 'Adpos/del', 1, 1, '', 44, 0, ''),
(82, '广告添加', 'Advertisement/add', 1, 1, '', 45, 0, ''),
(83, '广告修改', 'Advertisement/edit', 1, 1, '', 45, 0, ''),
(84, '广告删除', 'Advertisement/del', 1, 1, '', 45, 0, ''),
(85, '广告开启状态修改', 'Advertisement/updateStatic', 1, 1, '', 45, 0, ''),
(86, '批量广告状态修改', 'Advertisement/updateAllStatic', 1, 1, '', 45, 0, ''),
(87, '广告排序', 'Advertisement/sort', 1, 1, '', 45, 0, '');


DROP TABLE IF EXISTS `tp_cate`;
CREATE TABLE `tp_cate` (
  `id` mediumint(9) NOT NULL,
  `catename` varchar(60) NOT NULL COMMENT '栏目名称',
  `title` varchar(60) NOT NULL COMMENT '栏目标题',
  `keyword` varchar(150) NOT NULL COMMENT '关键词',
  `desc` varchar(255) NOT NULL COMMENT '描述',
  `content` text NOT NULL COMMENT '内容',
  `bottom_nav` tinyint(1) DEFAULT '0' COMMENT '是否在底部显示',
  `state` enum('0','1') NOT NULL DEFAULT '1' COMMENT '隐藏栏目，0隐藏，1显示',
  `img` varchar(150) NOT NULL COMMENT '封面图片',
  `cate_attr` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '栏目属性，0列表，1封面,2外联',
  `list_tmp` varchar(60) NOT NULL COMMENT '列表模板',
  `article_tmp` varchar(60) NOT NULL COMMENT '内容模板',
  `index_tmp` varchar(60) NOT NULL COMMENT '频道模板',
  `link` varchar(120) DEFAULT NULL,
  `sort` tinyint(4) NOT NULL DEFAULT '50',
  `pid` mediumint(9) NOT NULL DEFAULT '0',
  `model_id` mediumint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `tp_cate` (`id`, `catename`, `title`, `keyword`, `desc`, `content`, `bottom_nav`, `state`, `img`, `cate_attr`, `list_tmp`, `article_tmp`, `index_tmp`, `link`, `sort`, `pid`, `model_id`) VALUES
(74, '新闻动态', '新闻动态', '新闻动态', '新闻动态', '<p>新闻动态<br></p>', 0, '1', '', '0', 'list_article.html', 'article_article.html', 'index_article.html', '', 50, 0, 0),
(75, '产品中心', '产品中心', '产品中心', '产品中心', '<p>产品中心<br></p>', 0, '1', '', '1', 'list_article.html', 'article_article.html', 'list_img.html', '', 50, 0, 0),
(76, '技术服务', '技术服务', '技术服务', '技术服务', '<p>技术服务<br></p>', 0, '1', '', '1', 'list_article.html', 'article_article.html', 'list_img.html', '', 50, 0, 0),
(77, '联系我们', '联系我们', '联系我们', '联系我们', '<p>联系我们<br></p>', 0, '1', '', '0', 'list_article.html', 'article_article.html', 'index_article.html', '', 50, 0, 0),
(78, '公司新闻', '公司新闻', '公司新闻', '公司新闻', '<p>公司新闻<br></p>', 0, '1', '', '0', 'list_article.html', 'article_article.html', 'index_article.html', '', 50, 74, 0),
(79, '行业动态', '行业动态', '行业动态', '行业动态', '<p>行业动态<br></p>', 0, '1', '', '0', 'list_article.html', 'article_article.html', 'index_article.html', '', 50, 74, 0),
(80, '产品分类一', '产品分类一', '产品分类一', '产品分类一', '<p>产品分类一<br></p>', 0, '1', '', '0', 'list_article.html', 'article_article.html', 'index_article.html', '', 50, 75, 0),
(81, '产品分类二', '产品分类二', '产品分类二', '产品分类二', '<p>产品分类二<br></p>', 0, '1', '', '0', 'list_article.html', 'article_article.html', 'index_article.html', '', 50, 75, 0),
(73, '公司简介', '公司简介', '公司简介', '公司简介', '<p>公司简介<br></p>', 1, '1', '', '0', 'list_article.html', 'article_article.html', 'index_article.html', '', 50, 72, 0),
(72, '关于我们', '关于我们', '关于我们', '关于我们', '<p>本网站由黄龙攀根据网上是视频教程制作完成<br></p>', 1, '1', '', '0', 'list_article.html', 'article_article.html', 'index_article.html', '', 50, 0, 0);



DROP TABLE IF EXISTS `tp_conf`;
CREATE TABLE `tp_conf` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `cname` varchar(60) NOT NULL COMMENT '中文名',
  `ename` varchar(60) NOT NULL COMMENT '英文名',
  `value` text NOT NULL COMMENT '默认值',
  `values` varchar(255) NOT NULL COMMENT '可选值',
  `dt_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1文本输入，2单选，3多选，4下拉菜单，5文本域，6附件 7浮点，8整型，9长文本',
  `cf_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1基本信息，2联系方式，3SEO设置'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `tp_conf` (`id`, `cname`, `ename`, `value`, `values`, `dt_type`, `cf_type`) VALUES
(3, '站点和网址', 'siteurl', 'aaa', '', 1, 1),
(6, '联系人', 'contact', '', '', 1, 2),
(4, '静态保存路径', 'path', '', '', 1, 1),
(5, '网站logo', 'logo', '', '', 6, 1),
(7, 'QQ群', 'qq', '', '', 1, 2),
(8, '邮箱', 'email', '', '', 1, 2),
(9, '站点名称', 'sitename', '', '', 1, 3),
(10, '站点关键词', 'keywords', '', '', 1, 3),
(11, '站点描述', 'desc', 'aa', '', 5, 3),
(12, '开启缓存', 'iscache', '开启', '开启,关闭', 2, 3),
(13, '关闭站点', 'closesite', '开启', '关闭,开启', 4, 1),
(14, '联系方式', 'contactway', '', '电话,QQ,传真', 3, 2),
(40, '是否允许处理缩略图', 'thumb', '否', '是,否', 2, 1),
(41, '缩略图宽度', 'thumbWidth', '300', '', 1, 1),
(42, '缩略图高度', 'thumbHeight', '180', '', 1, 1),
(43, '缩略图处理方式', 'thumbConst', '等比例缩放', '等比例缩放,缩放后填充,居中裁剪,左上角裁剪,右下角裁剪,固定尺寸缩放', 2, 1),
(47, '是否开启文字水印', 'water-text', '否', '是,否', 2, 1),
(44, '是否开启图片水印', 'thumbWater', '是', '是,否', 2, 1),
(45, '水印位置', 'thumbWaterSouth', '左上角', '左上角,上居中,右上角,左居中,居中,右居中,左下角,下居中,右下角', 4, 1),
(46, '水印图片', 'water-img', '20181124\\23be85ecdbdfcbe56e17038718d5322a.png', '', 6, 1),
(48, '文字水印描述', 'text-text', 'cms水印', '', 1, 1),
(49, '图片水印透明度', 'water-tmd', '50', '', 1, 1),
(50, '模板加载', 'template', 'default', 'default,diy1,diy2', 4, 1);


DROP TABLE IF EXISTS `tp_html`;
CREATE TABLE `tp_html` (
  `id` mediumint(9) NOT NULL,
  `nid` mediumint(7) NOT NULL COMMENT '所属采集id',
  `title` varchar(150) NOT NULL COMMENT '文章标题',
  `url` varchar(150) NOT NULL COMMENT '文章地址',
  `addtime` int(10) NOT NULL COMMENT '采集时间',
  `export` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否导出，0未导出',
  `result` longtext NOT NULL COMMENT '采集结果集'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='采集数据临时存储';


DROP TABLE IF EXISTS `tp_model`;
CREATE TABLE `tp_model` (
  `id` mediumint(8) NOT NULL,
  `model_name` varchar(60) NOT NULL,
  `table_name` varchar(60) NOT NULL,
  `state` mediumint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tp_model_field`;
CREATE TABLE `tp_model_field` (
  `id` mediumint(9) NOT NULL,
  `model_id` mediumint(9) NOT NULL,
  `field_cname` varchar(60) NOT NULL,
  `field_ename` varchar(60) NOT NULL,
  `field_type` mediumint(1) NOT NULL,
  `field_values` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `tp_note`;
CREATE TABLE `tp_note` (
  `id` mediumint(9) NOT NULL COMMENT '节点id',
  `note_name` varchar(60) NOT NULL COMMENT '节点名称',
  `model_id` mediumint(9) NOT NULL COMMENT '所属模型',
  `output_encoding` varchar(30) NOT NULL COMMENT '输出编码',
  `input_encoding` varchar(30) NOT NULL COMMENT '输入编码',
  `addtime` int(10) NOT NULL COMMENT '添加时间',
  `lasttime` int(10) NOT NULL COMMENT '最后采集时间',
  `list_rules` varchar(255) NOT NULL COMMENT '列表页采集规则',
  `item_rules` longtext NOT NULL COMMENT '内容采集规则'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='采集';



ALTER TABLE `tp_ad`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tp_admin`
--
ALTER TABLE `tp_admin`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tp_adpos`
--
ALTER TABLE `tp_adpos`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tp_archives`
--
ALTER TABLE `tp_archives`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tp_auth_group`
--
ALTER TABLE `tp_auth_group`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tp_auth_group_access`
--
ALTER TABLE `tp_auth_group_access`
  ADD UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `group_id` (`group_id`);

--
-- 表的索引 `tp_auth_rule`
--
ALTER TABLE `tp_auth_rule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`title`);

--
-- 表的索引 `tp_cate`
--
ALTER TABLE `tp_cate`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tp_conf`
--
ALTER TABLE `tp_conf`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tp_html`
--
ALTER TABLE `tp_html`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tp_model`
--
ALTER TABLE `tp_model`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tp_model_field`
--
ALTER TABLE `tp_model_field`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tp_note`
--
ALTER TABLE `tp_note`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--
ALTER TABLE `tp_ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用表AUTO_INCREMENT `tp_admin`
--
ALTER TABLE `tp_admin`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用表AUTO_INCREMENT `tp_adpos`
--
ALTER TABLE `tp_adpos`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `tp_archives`
--
ALTER TABLE `tp_archives`
  MODIFY `id` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `tp_auth_group`
--
ALTER TABLE `tp_auth_group`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `tp_auth_rule`
--
ALTER TABLE `tp_auth_rule`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- 使用表AUTO_INCREMENT `tp_cate`
--
ALTER TABLE `tp_cate`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- 使用表AUTO_INCREMENT `tp_conf`
--
ALTER TABLE `tp_conf`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- 使用表AUTO_INCREMENT `tp_html`
--
ALTER TABLE `tp_html`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- 使用表AUTO_INCREMENT `tp_model`
--
ALTER TABLE `tp_model`
  MODIFY `id` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `tp_model_field`
--
ALTER TABLE `tp_model_field`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `tp_note`
--
ALTER TABLE `tp_note`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '节点id', AUTO_INCREMENT=7;
