/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : localhost:3306
 Source Schema         : gwht

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : 65001

 Date: 02/04/2019 16:17:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_file
-- ----------------------------
DROP TABLE IF EXISTS `tb_file`;
CREATE TABLE `tb_file`  (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NOT NULL COMMENT '文件名',
  `file_classify` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NULL DEFAULT NULL COMMENT '文件分类 1:app 2:文档',
  `format` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NULL DEFAULT NULL COMMENT '文件格式名',
  `file_size` double NULL DEFAULT NULL COMMENT '文件大小',
  `file_url` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NULL DEFAULT NULL COMMENT '文件地址url',
  `is_status` tinyint(2) NULL DEFAULT 1 COMMENT '文件状态,1:正常 2:删除',
  `upload_date` datetime(0) NULL DEFAULT NULL COMMENT '上传时间',
  `change_time` datetime(0) NULL DEFAULT NULL COMMENT '修改时间',
  `version_number` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NULL DEFAULT NULL COMMENT '版本号',
  `introduce` text CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NULL COMMENT '介绍',
  `ranking` int(11) NULL DEFAULT 999 COMMENT '排名排序 升序',
  PRIMARY KEY (`fid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 61 CHARACTER SET = gb2312 COLLATE = gb2312_chinese_ci COMMENT = '文件表  spu 标准化产品单元' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_file
-- ----------------------------
INSERT INTO `tb_file` VALUES (1, '文件1', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180918\\f5a00b669630d95e298e7141f045f6e9.doc', 2, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (2, 'app2', '2', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180918\\6b108dd97f5d008087debce7ee288c40.doc', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (3, '文件3', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180918\\9ced4cb23ca961f53811fad60711b6b8.doc', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (4, '222', '2', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180918\\ad940adbea40f2d259f38c2d0adf698d.doc', 2, '2019-03-28 16:40:02', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (5, '4444', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180918\\bda1f49dae6dbd9a88ec100ce75afbc0.doc', 2, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (6, 'svn', '1', 'txt', 0, 'http://192.168.85.31/gw_ht/public/static/uploads/20180918\\408ac6b98ada3c940ea8cdb169fd3ad8.txt', 1, '2019-03-28 15:20:03', NULL, '11', NULL, 999);
INSERT INTO `tb_file` VALUES (7, '公文1', '2', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\742b6f0816c0071e28b214bffb5b65ba.doc', 2, '2019-03-28 15:20:03', NULL, '11', NULL, 999);
INSERT INTO `tb_file` VALUES (8, '公文2', '2', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\3fe307b1d173408fcf474999071f6d49.doc', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (9, '公文3', '2', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\09cb633770ebcb1b3d4163b1d892c03c.doc', 2, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (10, 'app1', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\b65e3184085971706dc2101c85fad21b.doc', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (11, 'app2', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\3857c4ba7919e0ba4d962c8365ce4b81.doc', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (12, 'app3', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\e458a3095d2bb71425526ddd464aeb3c.doc', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (13, 'app4', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\eab9f9a9b3b73f726294eecd222b2478.doc', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (14, 'app5', '1', 'txt', 179, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\99abe15b653458af8bfea7004c8e52de.txt', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (15, 'app6', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\05002e69fec8c077e6348efbbe75f1b5.doc', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (16, 'app7', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\78db0da95a519a61b2322053093b54a3.doc', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (17, 'app8', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\4491fbd52bb814f560a99f7bd204262d.doc', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (18, 'app9', '1', 'txt', 179, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\ceac0a1076b9963db32852d722bd9179.txt', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (19, 'app10', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\1a4498f3061da8be8ac45d851ba21d3c.doc', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (20, 'app11', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\59ba8ee30e0209f768489a4c01356ee4.doc', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (21, 'app12', '1', 'txt', 0, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\efd5163a3e08d529cf14839ec4cac55e.txt', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (22, 'app13', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\5aa72491eb289daee0e292951901e327.doc', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (23, 'app14', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\665ed3da807d2e2226eb6d2a6e7233f7.doc', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (24, 'app15', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\ec2e264afc5a99ee60fc6f308e0def00.doc', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (25, 'app16', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\888f443c79c06e1513d68c9d4ea57dd3.doc', 1, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (26, 'app17', '1', 'txt', 0, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\2946b05420367f6d53acf9dc155dff21.txt', 1, '2019-03-28 15:20:03', NULL, '5', NULL, 999);
INSERT INTO `tb_file` VALUES (27, 'app18', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20180919\\8ba16aa72caa0c3020a9665c5362258f.doc', 1, '2019-03-28 15:20:03', NULL, '4', NULL, 999);
INSERT INTO `tb_file` VALUES (28, 'app1', '1', 'apk', 0, 'http://192.168.85.31/gw_ht/public/static/uploads/20180928\\8b4bbb7608b70ff843ccdfd142910783.apk', 1, '2019-03-28 15:20:03', NULL, '5', NULL, 999);
INSERT INTO `tb_file` VALUES (29, 'app2', '1', 'apk', 0, 'http://192.168.85.31/gw_ht/public/static/uploads/20180928\\21041cd6aff2c9fe7f8fb8a098a3b081.apk', 1, '2019-03-28 15:20:03', NULL, '6', NULL, 999);
INSERT INTO `tb_file` VALUES (30, 'app3', '1', 'apk', 0, 'http://192.168.85.31/gw_ht/public/static/uploads/20180928\\130d4872c2ccba45e712f6b9614e6114.apk', 2, '2019-03-28 15:20:03', NULL, '4', NULL, 999);
INSERT INTO `tb_file` VALUES (31, '1', '1', 'txt', 0, 'http://192.168.85.31/gw_ht/public/static/uploads/20180928\\537ee06c90e593193742914fae7b8f74.txt', 2, '2019-03-28 15:20:03', NULL, '3', NULL, 999);
INSERT INTO `tb_file` VALUES (32, '2', '1', 'txt', 0, 'http://192.168.85.31/gw_ht/public/static/uploads/20180928\\00d70b034330753a40c5cc4d41b21b2a.txt', 2, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (33, '3', '1', 'txt', 0, 'http://192.168.85.31/gw_ht/public/static/uploads/20180928\\f51175b39a0564a5ebab2d08c5b5a0a4.txt', 2, '2019-03-28 15:20:03', NULL, '2', NULL, 999);
INSERT INTO `tb_file` VALUES (34, 'app3', '1', 'txt', 0, 'http://192.168.85.31/gw_ht/public/static/uploads/20180929\\64568bd1c4c03ca9f653bc67ebecba82.txt', 2, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (35, '测试', '1', 'txt', 0, 'http:\\192.168.85.31\\gw_ht\\public\\static\\uploads/20180929\\ea1ae9c330ede736c0b9be671758a319.txt', 2, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (36, '盒子', '1', 'apk', 0, 'http://192.168.85.31/gw_ht/public/static/uploads/20180929\\c180f3f6d75c4157ab8675fba1230419.apk', 2, '2019-03-28 15:20:03', NULL, '1', NULL, 999);
INSERT INTO `tb_file` VALUES (37, '文件上传测试15号', '1', 'txt', 0, 'http://192.168.85.31/gw_ht/public/static/uploads/20181015\\26f41eaa621bd66a7c09688bac2ea3b3.txt', 2, '2019-03-28 15:20:03', NULL, '12', '吃饭哈哦啊', 999);
INSERT INTO `tb_file` VALUES (38, '', '2', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20190326\\db36424058ccaae8dce5f30a5cce43c6.doc', 2, '2019-03-28 15:20:03', NULL, '', '', 999);
INSERT INTO `tb_file` VALUES (39, 'ZQ公文', '2', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20190326\\bf5422f7290f3645c45867ae1cc88772.doc', 1, '2019-03-28 15:16:35', NULL, '', '111', 999);
INSERT INTO `tb_file` VALUES (40, '33', NULL, 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20190326\\eab5096f499f8257ce5a35bff52c96da.doc', 1, '2019-03-28 15:20:03', NULL, '11', '111', 999);
INSERT INTO `tb_file` VALUES (41, '11', NULL, 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20190326\\e0b7d5d62cc0744d97d82762fea2f2c6.doc', 1, '2019-03-28 15:20:03', NULL, NULL, '11', 999);
INSERT INTO `tb_file` VALUES (42, 'app3-26', NULL, 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20190326\\8577fccfef7e4cf7e3338df054f7f6a8.doc', 1, '2019-03-28 15:20:03', NULL, '1', '111', 999);
INSERT INTO `tb_file` VALUES (43, '公文3-26', NULL, 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20190326\\c8111def150bded2488f901ea855e21e.doc', 1, '2019-03-28 15:20:03', NULL, NULL, '1333', 999);
INSERT INTO `tb_file` VALUES (44, 'app3-26?001', '1', 'apk', 0, 'http://192.168.85.31/gw_ht/public/static/uploads/20190326\\6fbcc905ecfaf17734277ad618b1836c.apk', 1, '2019-03-28 15:20:03', NULL, '1', '噢噢ofo', 999);
INSERT INTO `tb_file` VALUES (45, 'ZQ公文3-26  001', '2', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20190326\\c70b67e63572c3eae0541823098fa473.doc', 1, '2019-03-28 15:22:14', NULL, '', '233', 998);
INSERT INTO `tb_file` VALUES (46, '11', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20190326\\9a150f5ae0d7478ec039b005e78b7162.doc', 2, '2019-03-28 16:42:19', NULL, '11', '111', 999);
INSERT INTO `tb_file` VALUES (47, 'test', NULL, NULL, NULL, NULL, 1, '2019-03-28 15:20:03', NULL, NULL, NULL, 999);
INSERT INTO `tb_file` VALUES (48, '11', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20190326\\a451d2fe8bfd419593ebe9daf500add7.doc', 1, '2019-03-28 15:20:03', NULL, '22', '334', 999);
INSERT INTO `tb_file` VALUES (49, '11', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20190326\\efd9a9e155bbab78c2086dde4619b7d1.doc', 1, '2019-03-28 15:20:03', NULL, '22', '334', 999);
INSERT INTO `tb_file` VALUES (50, '2', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20190326\\fa46d01a6e62492950efd3f3a668fd9c.doc', 2, '2019-03-28 16:42:10', NULL, '3', '11', 999);
INSERT INTO `tb_file` VALUES (51, '11', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20190326\\d2e5a1c19679a1609f3f215965b4b474.doc', 2, '2019-03-28 16:42:01', NULL, '22', '33', 999);
INSERT INTO `tb_file` VALUES (52, '测试001', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20190326\\5f55d3a50a7b71c5b2c3092cc395393a.doc', 1, '2019-03-28 15:20:03', NULL, '11', '11', 999);
INSERT INTO `tb_file` VALUES (53, 'QQ', '1', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20190326\\c1f6a331a9c4934612e315508ba25aa5.doc', 1, '2019-03-28 15:20:03', NULL, 'WW', 'WW', 999);
INSERT INTO `tb_file` VALUES (54, '2211', '2', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20190326\\cb90ec2953e2a8d3f08daae9dfc3d2c8.doc', 2, '2019-03-28 16:39:54', NULL, '33', '444', 999);
INSERT INTO `tb_file` VALUES (55, '天下第一', '1', 'png', 37866, 'http://192.168.85.31/gw_ht/public/static/uploads/20190326\\ea547b17ade615c51efe53c054d930e0.png', 1, '2019-03-28 16:12:37', NULL, '22', '1122', 1);
INSERT INTO `tb_file` VALUES (56, '10086', '1', 'jpg', 16854, 'http://192.168.85.31/gw_ht/public/static/uploads/20190326\\bce7b8c233b3a262dcdf1305f6c3ef8b.jpg', 2, '2019-03-28 15:20:03', NULL, '2', '1', 999);
INSERT INTO `tb_file` VALUES (57, '文件文档233', '2', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20190327\\2f74c61e2cad4e401a69d1f253eed4b8.doc', 1, '2019-03-28 15:20:03', NULL, '', '文档', 999);
INSERT INTO `tb_file` VALUES (58, '天下第二', '1', 'apk', 0, 'http://192.168.85.31/gw_ht/public/static/uploads/20190328\\ed7395a86c247a730a59dee250c7722f.apk', 1, '2019-03-28 15:31:17', NULL, 'v2.0', '第二', 999);
INSERT INTO `tb_file` VALUES (59, 'APP上传', '1', 'jpg', 16854, 'http://192.168.85.31/gw_ht/public/static/uploads/20190402\\2c850772ca360d6282eb6b424d00c21f.jpg', 1, '2019-04-02 15:43:28', '2019-04-02 15:44:07', 'v2.1', '这是app1234', 1);
INSERT INTO `tb_file` VALUES (60, '超强文档', '2', 'doc', 9728, 'http://192.168.85.31/gw_ht/public/static/uploads/20190402\\49fcf24f195fe3702af6fe1bf165ac63.doc', 1, '2019-04-02 15:51:49', '2019-04-02 16:00:00', '', '11123', 1);

-- ----------------------------
-- Table structure for tb_file_classify
-- ----------------------------
DROP TABLE IF EXISTS `tb_file_classify`;
CREATE TABLE `tb_file_classify`  (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `classify_name` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NULL DEFAULT NULL COMMENT '分类名称',
  PRIMARY KEY (`cid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = gb2312 COLLATE = gb2312_chinese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_file_classify
-- ----------------------------
INSERT INTO `tb_file_classify` VALUES (1, 'app');
INSERT INTO `tb_file_classify` VALUES (2, '文档');

-- ----------------------------
-- Table structure for tb_file_field
-- ----------------------------
DROP TABLE IF EXISTS `tb_file_field`;
CREATE TABLE `tb_file_field`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NULL DEFAULT NULL COMMENT 'file表id',
  `field_name` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NULL DEFAULT NULL COMMENT '字段名称',
  `field_value` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NULL DEFAULT NULL COMMENT '字段值',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = gb2312 COLLATE = gb2312_chinese_ci COMMENT = '文件关系表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_file_field
-- ----------------------------
INSERT INTO `tb_file_field` VALUES (1, 1, '版本号', '1.0.0');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NOT NULL COMMENT '用户名，登录用',
  `password` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NOT NULL COMMENT '用户密码，不少于6位',
  `sex` int(2) NULL DEFAULT NULL COMMENT ' 用户性别 1:男 2:女',
  `is_status` int(3) NULL DEFAULT 1 COMMENT '用户状态 1:正常 2:禁止登录',
  `creation_time` datetime(0) NULL DEFAULT NULL COMMENT '账号创建时间',
  `remarks` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NULL DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = gb2312 COLLATE = gb2312_chinese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, NULL, '超级管理员账号');
INSERT INTO `tb_user` VALUES (2, 'test001', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, NULL, NULL);
INSERT INTO `tb_user` VALUES (3, 'test002', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, NULL, NULL);
INSERT INTO `tb_user` VALUES (4, 'test003', 'e10adc3949ba59abbe56e057f20f883e', NULL, 2, NULL, NULL);
INSERT INTO `tb_user` VALUES (5, 'test11', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 1, NULL, NULL);
INSERT INTO `tb_user` VALUES (6, 'test112', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 1, NULL, NULL);
INSERT INTO `tb_user` VALUES (7, 'test233', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 1, '2019-03-27 10:10:29', '1111');
INSERT INTO `tb_user` VALUES (8, '11', '6512bd43d9caa6e02c990b0a82652dca', NULL, 1, '2019-03-27 15:15:37', '11');

SET FOREIGN_KEY_CHECKS = 1;
