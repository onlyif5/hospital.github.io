/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50614
Source Host           : localhost:3306
Source Database       : hospital

Target Server Type    : MYSQL
Target Server Version : 50614
File Encoding         : 65001

Date: 2016-01-06 22:45:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `doctor`
-- ----------------------------
DROP TABLE IF EXISTS `doctor`;
CREATE TABLE `doctor` (
  `Did` int(11) NOT NULL AUTO_INCREMENT,
  `Hid` int(11) NOT NULL,
  `Kid` int(11) NOT NULL,
  `Dname` varchar(20) NOT NULL,
  `Dsex` varchar(20) NOT NULL,
  `Dsummary` varchar(1000) NOT NULL,
  `Dhead` varchar(20) DEFAULT NULL,
  `Dtime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Did`),
  KEY `Hid` (`Hid`),
  KEY `Kid` (`Kid`),
  CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`Hid`) REFERENCES `hospital` (`Hid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `doctor_ibfk_2` FOREIGN KEY (`Kid`) REFERENCES `keshi` (`Kid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of doctor
-- ----------------------------
INSERT INTO `doctor` VALUES ('1', '1', '2', '姚菊红', '女', '儿科主任医师,熟悉儿科各系统常见病的诊治，注重理论与实践相结合，多年来诊治了许多儿科危重疑难病人。在大量的临床实践中，积累了丰富的经验，专业知识较全面扎实，有着丰富的临床经验。', 'yjh.png', '星期一');
INSERT INTO `doctor` VALUES ('2', '2', '3', '张国珍', '女', '副主任中医师。出身中医世家，是宁波市非物质文化遗产胡氏中医外科传承人，师承祖父胡益平、父亲胡祥庆老中医，在他们的言传身教中传承家学渊源，把胡氏外科独创的秘方灵活运用于临床，从事中医外科三十多年，传承了前辈的验方、秘方级学术经验，并发扬、坚持内治与外治并重，对痈、疽、疔、疖、脉管炎、骨髓炎、褥疮、乳痈乳疾等疾病的治疗更是得心应手。周一至周五中医外科门诊。', 'zgz.png', '星期二');
INSERT INTO `doctor` VALUES ('3', '3', '4', '俞承烈', '男', '中医内科主任中医师，浙江中医学院（现浙江中医药大学）中医系毕业。浙江省基层名中医，余姚市名中医，余姚市优秀专业技术人才。1982年定为浙江省高级中医学术助手，1992年定为全国首批名老中医药专家学术经验继承人，师从国家级名医赵炯恒主任中医师，全国首届中医药传承高徒奖获得者。从事中医临床工作三十余年，积累了丰富的临床经验。近年来又师从上海市中医医院全国著名中医学家王翘楚教授，开展失眠为主症及其相关疾病的临床和科研工作。在国家级省级医学核心期刊上公开发表学术论文20余篇，主编出版专业著作1部，参编出版著作3部。先后主持和参与省级科研课题4项，获市科技进步奖1项，省中医药科技奖1项。周二、三（上午）、四中医内科门诊。', 'ycl.png', '星期二');
INSERT INTO `doctor` VALUES ('4', '4', '1', '卢晓峰', '男', '副主任中医师、慈溪市中医药学会理事、大学本科 1997年毕业于浙江中医药大学中医临床专业，在职研究生结业。曾赴杭州市中医院进修一年，擅长中西医治疗胃癌、肺癌、肠癌、胰腺癌、恶性淋巴瘤等肿瘤疾病及急慢性胃炎、急慢性肝炎、慢性肠炎等消化系统疾病。在省级以上期刊发表学术论文数篇，参与多项省、市级科研课题。 所在科室: 中内科 专家门诊时间，每周二、周日坐诊。', 'lxf.png', '星期五');
INSERT INTO `doctor` VALUES ('5', '5', '5', '单均基', '男', '副主任医师、副院长、大学本科 开展胃肠癌根治术、胆道探查及胆囊切除术，甲状腺全切除及次全切术、乳腺癌根治术、子宫全切及次全切除术等手术。 所在科室: 外科 坐诊时间: 周三、五上午', 'sjj.png', '星期三');
INSERT INTO `doctor` VALUES ('6', '1', '2', '姚菊红', '女', '打算打算的撒打算打算的撒打算的撒打算的定位球的巍峨的山东省的水电费广东省个非官方个分发高热各色人个人过', 'yjh.png', '星期二');

-- ----------------------------
-- Table structure for `hospital`
-- ----------------------------
DROP TABLE IF EXISTS `hospital`;
CREATE TABLE `hospital` (
  `Hid` int(11) NOT NULL AUTO_INCREMENT,
  `Hname` varchar(20) NOT NULL,
  `Harea` varchar(20) NOT NULL,
  `Hgrade` varchar(20) NOT NULL,
  `Hhead` varchar(20) NOT NULL,
  `Hsummary` varchar(1000) DEFAULT NULL,
  `HnumOfOrder` int(255) DEFAULT NULL,
  PRIMARY KEY (`Hid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hospital
-- ----------------------------
INSERT INTO `hospital` VALUES ('1', '浙江大学国际医院', '杭州', '三级甲等', 'zjdxgjyy.png', '东欣（杭州）医院（浙江大学国际医院）是一家由院士团队发起创办，社会力量参与，以“患者满意、医生满意、政府满意”三满意为宗旨，以“高水平的专家、高质量的医疗、高品质的服务“为标准，围绕“全人全程”健康服务理念建设的国际化、智能化、标准化、人性化新型三级综三级甲等医院，先后增挂浙江省医学科学院临床研究院、南京医科大学附属杭州医院的院牌。我院是杭州地区骨干医疗机构，杭州市药剂、放射、病理、护理、急救、检验、产', '121321');
INSERT INTO `hospital` VALUES ('2', '余姚人民医院', '宁波', '三级乙等', 'yyrmyy.png', '余姚市人民医院又称阳明医院，由余姚旅沪同乡著名金融家宋汉章先生于1947年集资创建，现已发展为余姚市规模最大、设施最全、技术力量最雄厚的一家集医疗、急救、科研、教学、预防保健和康复为一体的三级乙等综合性医院。2008年7月，医院整体迁址至城东新区，占地280亩。 全', '5645');
INSERT INTO `hospital` VALUES ('3', '乐清中医院', '温州', '二级甲等', 'lqzyy.png', '乐清市中医院创建于1986年7月，1998年被评为国家二级乙等中医院，2005年通过“二乙”复评，2012年通过浙江省“二级甲等”中医医院评审。医', '12156');
INSERT INTO `hospital` VALUES ('4', '嘉兴市中医院', '嘉兴', '三级甲等', 'jxszyy.png', '嘉兴市中医院诞生于1959年，是嘉兴市属集医疗救护、教学科研、康复保健为一体的综合性、现代化的国家级三级甲等中医医院。医院现核定床位600张，年门急诊量125万人次，年住院病人2.79万人次。是浙江省文明单位、浙江省中医名院建设单位、国家重点建设中医院，浙江省首', '45456');
INSERT INTO `hospital` VALUES ('5', '德清县人民医院', '湖州', '二级甲等', 'dqxrmyy.png', '德清县人民医院是由原第一、第二人民医院于1999年合并组建而成，2005年经考核评审成为二级甲等综合性医院，2011年9月顺利通过复评，是浙北地区规模较大的集医疗、教学、科研、预防、保健、急救为一体的县级非营利性医疗机构，也是省、市大、中专医学院校定点的教学医院，', '44562');
INSERT INTO `hospital` VALUES ('6', '浙一大', '杭州', '三级甲等', 'zyd.png', '倒萨打算打算打算打算的撒打算打算打算的撒的水电费等三个丰东股份干活多个省份的人格阿福', '78898');
INSERT INTO `hospital` VALUES ('7', '浙二医院', '杭州', '三级甲等', 'zeyy.png', '米林繁缕恢复规划规范和规划法规和法国恢复该合同问题儿童对方水电费水电费水电费说对方是个好丰田热热疼', '2323');
INSERT INTO `hospital` VALUES ('8', '杭州市第一人民医院', '杭州', '三级甲等', 'hzsdyrmyy.png', '我院创建于1923年，是杭州地区融医疗、教学、科研、预防和社会保健于一体的市属最大综合性三级甲等医院，先后增挂浙江省医学科学院临床研究院、南京医科大学附属杭州医院的院牌。我院是杭州地区骨干医疗机构，杭州市药剂、放射、病理、护理、急救、检验、产科、院感、骨科、ICU等质控中心挂靠单位，杭州市危重孕产妇抢救中心。多年来，医院始终秉承“敬业、严谨、诚信、仁爱”的办院宗旨，全心全意地为广大患者服务，先后荣获全国卫生系统先进集体、全国百姓放心示范医院、卫生部院务公开示范医院、浙江省文明示范医院、杭州市文明单位、浙江省文明单位等荣誉，为杭州地区的医药卫生事业作出了应有的贡献。', '45646');
INSERT INTO `hospital` VALUES ('9', '杭州市西溪医院', '杭州', '三级甲等', 'hzsxqyy.png', '杭州市西溪医院（杭州市第六人民医院、浙江中医药大学附属医院）是由杭州市政府全额投资新建的公立医院，为一家集医疗、教学、科研、预防、保健为一体的，以诊治肝病、感染病为特色的三级甲等医院，一期开放床位600张，现已开设肝病、内、外、妇、儿科、皮肤性病等门急诊与病房。副主任医师职称以上人员100余人。博、硕士100余人，博、硕导20余人，现有职工1100人。 杭州市西溪医院位于西湖区留下镇小和山区块，地处天目山路与绕城北线交叉西南面，毗邻杭州市西溪湿地国家公园，依山傍水，环境优美。医院于2007年立项，总投资人民币6.7亿元，占地面积为134.4亩，总建筑面积6.85万平方米。杭州市西溪医院在承接杭州市第六人民医院的全部医疗服务功能的基础上，不断加强综合学科的建设，努力将医院建设成为具有国内一流、国际先进水平的现代化综合性三级甲等医院!', '31233');

-- ----------------------------
-- Table structure for `h_k`
-- ----------------------------
DROP TABLE IF EXISTS `h_k`;
CREATE TABLE `h_k` (
  `Hid` int(11) NOT NULL,
  `Kid` int(11) NOT NULL,
  PRIMARY KEY (`Hid`,`Kid`),
  KEY `Kid` (`Kid`),
  CONSTRAINT `h_k_ibfk_1` FOREIGN KEY (`Hid`) REFERENCES `hospital` (`Hid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `h_k_ibfk_2` FOREIGN KEY (`Kid`) REFERENCES `keshi` (`Kid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of h_k
-- ----------------------------
INSERT INTO `h_k` VALUES ('1', '1');
INSERT INTO `h_k` VALUES ('2', '1');
INSERT INTO `h_k` VALUES ('3', '1');
INSERT INTO `h_k` VALUES ('4', '1');
INSERT INTO `h_k` VALUES ('5', '1');
INSERT INTO `h_k` VALUES ('6', '1');
INSERT INTO `h_k` VALUES ('7', '1');
INSERT INTO `h_k` VALUES ('1', '2');
INSERT INTO `h_k` VALUES ('2', '2');
INSERT INTO `h_k` VALUES ('3', '2');
INSERT INTO `h_k` VALUES ('4', '2');
INSERT INTO `h_k` VALUES ('5', '2');
INSERT INTO `h_k` VALUES ('6', '2');
INSERT INTO `h_k` VALUES ('1', '3');
INSERT INTO `h_k` VALUES ('2', '3');
INSERT INTO `h_k` VALUES ('3', '3');
INSERT INTO `h_k` VALUES ('4', '3');
INSERT INTO `h_k` VALUES ('5', '3');
INSERT INTO `h_k` VALUES ('6', '3');
INSERT INTO `h_k` VALUES ('7', '3');
INSERT INTO `h_k` VALUES ('1', '4');
INSERT INTO `h_k` VALUES ('2', '4');
INSERT INTO `h_k` VALUES ('3', '4');
INSERT INTO `h_k` VALUES ('4', '4');
INSERT INTO `h_k` VALUES ('5', '4');
INSERT INTO `h_k` VALUES ('7', '4');
INSERT INTO `h_k` VALUES ('1', '5');
INSERT INTO `h_k` VALUES ('2', '5');
INSERT INTO `h_k` VALUES ('3', '5');
INSERT INTO `h_k` VALUES ('4', '5');
INSERT INTO `h_k` VALUES ('5', '5');
INSERT INTO `h_k` VALUES ('7', '5');

-- ----------------------------
-- Table structure for `keshi`
-- ----------------------------
DROP TABLE IF EXISTS `keshi`;
CREATE TABLE `keshi` (
  `Kid` int(11) NOT NULL AUTO_INCREMENT,
  `Kname` varchar(20) NOT NULL,
  `Ksummary` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`Kid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keshi
-- ----------------------------
INSERT INTO `keshi` VALUES ('1', '内科', '近年来在微创治疗下腰痛、颈椎病、胸腰椎骨折等治疗领域位于国内领先地位，多项创新技术在全国应用推广。是省内率先开展了关节镜下治疗肩关节疾病、膝关节交叉韧带重建术的科室之一，在运动医学领域享有较高声誉。髋部前路小切口人工髋关节置换，局部麻醉下的经皮椎体成形术治疗骨质疏松性椎压缩骨折已形成特色，同时前路小自体软骨细胞移植等高科技的治疗手段填补国内空白。');
INSERT INTO `keshi` VALUES ('2', '外科', '1.脑缺血的动物模型，脑缺血的病理机理，脑缺血后脑保护机理及脑保护药物研发 2.蛛网膜下腔出血后脑血管痉挛的发生机制以及干预措施 3.脑损伤后神经细胞再生 4.脑出血后脑水肿的发生机制 5.神经系统肿瘤、脑血管疾病的微创手术治疗 6.功能和立体定向神经外科，如帕金森病，原发性震颤，肌张力障碍等临床与基础的研究 7.神经介入、脑血管病的临床与基础研究 8.脑积水的临床与基础研究.');
INSERT INTO `keshi` VALUES ('3', '皮肤科', '我科以慢支、哮喘、肺炎、呼吸衰竭的诊治为基本点，擅长肺部肿块、肺部感染、肺栓塞的诊治，及肺癌综合治疗和纤支镜介入治疗等。我科室浙江省最早开展肺血栓栓塞的流行病学、诊断和治疗等方面研究的单位，诊治水平在国内处于领先地位。');
INSERT INTO `keshi` VALUES ('4', '妇产科', '以角膜病专业为主。在角膜移植，眼烧伤，眼感染性疾病等领域均取得突破性的研究成果，开发了治疗眼烧伤的手术治疗新方法，建立了重症真菌性角膜炎的角膜移植治疗新技术，建立了真菌菌种鉴定新方法，药物敏感检测技术和真菌性角膜炎药物治疗的新方法，创立的以Yao\'s法命名的深板层角膜移植技术。');
INSERT INTO `keshi` VALUES ('5', '眼科', '1.肝脏、胆道、胰腺、脾脏、胃肠、疝等微创化治疗。我科是全国较早开展腹腔镜胆囊切除的单位，目前该手术年均完成达4000例左右，并将腹腔镜技术应用到胆总管探查取石，肝脏切除，胃癌根治术，结直肠癌根治术，胰腺切除术，脾脏切除术和腹壁疝修补术等大多数普外科领域，病例数量和医疗质量都居于全国领先地位，其中腹腔镜肝脏切除为全世界最大报道组之一。 2.消化道肿瘤的规范化治疗。恶性肿瘤一直位于致死原因的前三位，目前认为多学科合作规范化治疗恶性肿瘤是获得较好疗效的基础。我科一直致力于以手术为基础肿瘤规范化综合治疗，包括强调手术操作的规范化，术前和术后辅助放化疗，免疫治疗，围手术期营养支持，中医中药治疗。 3.血管疾患的手术和腔内治疗：我科是全省为数不多可以开展动静脉传统和腔内治疗的单位之一，可以独立完成包括腹主动脉置换，主动脉瘤支架植入等多种复杂手术');

-- ----------------------------
-- Table structure for `order_new`
-- ----------------------------
DROP TABLE IF EXISTS `order_new`;
CREATE TABLE `order_new` (
  `Uid` int(11) NOT NULL,
  `Hid` int(11) NOT NULL,
  `Did` int(11) NOT NULL,
  `orderTime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Uid`,`Did`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_new
-- ----------------------------
INSERT INTO `order_new` VALUES ('1', '2', '2', '星期二');
INSERT INTO `order_new` VALUES ('1', '1', '6', '星期一');
INSERT INTO `order_new` VALUES ('6', '1', '6', '星期一');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Uid` int(11) NOT NULL AUTO_INCREMENT,
  `Uname` varchar(20) NOT NULL,
  `Upassword` varchar(20) NOT NULL,
  `Usex` varchar(20) NOT NULL,
  `Uphone` varchar(20) NOT NULL,
  PRIMARY KEY (`Uid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'lilihan1', '123456', '男', '12345678911');
INSERT INTO `user` VALUES ('2', 'lilihan2', '123456', '男', '12345678910');
INSERT INTO `user` VALUES ('3', 'dassd321', '32321', '男', '11111111111');
INSERT INTO `user` VALUES ('4', 'gdfggdf43', '2323', '男', '22222222222');
INSERT INTO `user` VALUES ('5', 'dsad3232', '323', '男', '21211111111');
INSERT INTO `user` VALUES ('6', 'lilihan123', '123456789', '男', '13362180236');
