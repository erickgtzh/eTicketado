/*
 Navicat Premium Data Transfer

 Source Server         : eticket
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : eticket

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 15/04/2020 03:22:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for client
-- ----------------------------
DROP TABLE IF EXISTS `client`;
CREATE TABLE `client`  (
  `id_client` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_client`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of client
-- ----------------------------
INSERT INTO `client` VALUES (1, 'erick', '000', 'email');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `id_product` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `price` decimal(5, 2) NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_product`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (1, 'Voluteer at an awesome hostel in beautiful Puerto Vallarta', 300.00, 'Hey there! We\'re a backpacker hostel located right in the center of Puerto Vallarta. We like having fun! We like going on adventures during the day, and going for a night out on the town. We work hard and we play hard. We strive to make our place as clean', 'https://d34ad2g4hirisc.cloudfront.net/volunteer_positions/photos/000/024/608/main/737c8351760143a32d86fb4360dd237f.jpg');
INSERT INTO `product` VALUES (2, 'Come teach English and explore Mexico!', 429.00, 'We\'re looking for an English teacher, assistant in activities and games for children and teenagers. The activities begin at 8 am and finish at 02:00 pm. Breakfast and lunch are taken with the campers. Travelers have the afternoon free. Profesor de Inglés,', 'https://d34ad2g4hirisc.cloudfront.net/volunteer_positions/photos/000/024/341/main/125533298522d22161c8ef6728cc54b0.jpg');

-- ----------------------------
-- Table structure for sale
-- ----------------------------
DROP TABLE IF EXISTS `sale`;
CREATE TABLE `sale`  (
  `id_sale` int(255) NOT NULL AUTO_INCREMENT,
  `id_user` int(255) NOT NULL,
  `purchase_date` datetime(0) NOT NULL,
  `unique_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `transaction_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `total` decimal(5, 2) NOT NULL,
  PRIMARY KEY (`id_sale`) USING BTREE,
  INDEX `id_sale_user_fky`(`id_user`) USING BTREE,
  CONSTRAINT `id_sale_user_fky` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 96 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sale
-- ----------------------------
INSERT INTO `sale` VALUES (27, 1, '2020-04-14 02:37:06', 'mbqeme9v8a5fvq482mv5cis7kn', '8s7f6s7dd81j6p', 858.00);
INSERT INTO `sale` VALUES (28, 1, '2020-04-14 03:01:15', 'mbqeme9v8a5fvq482mv5cis7kn', '5e956dcb0014e', 858.00);
INSERT INTO `sale` VALUES (29, 1, '2020-04-15 01:35:58', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96ab4e5804a', 429.00);
INSERT INTO `sale` VALUES (30, 1, '2020-04-15 01:38:27', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96abe3b4ecd', 429.00);
INSERT INTO `sale` VALUES (31, 1, '2020-04-15 01:40:21', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96ac550a5cb', 429.00);
INSERT INTO `sale` VALUES (32, 1, '2020-04-15 01:40:34', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96ac627940c', 429.00);
INSERT INTO `sale` VALUES (33, 1, '2020-04-15 01:41:39', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96aca33350d', 429.00);
INSERT INTO `sale` VALUES (34, 1, '2020-04-15 01:46:53', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96addd092a8', 429.00);
INSERT INTO `sale` VALUES (35, 1, '2020-04-15 01:47:49', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96ae1552c31', 429.00);
INSERT INTO `sale` VALUES (36, 1, '2020-04-15 01:48:59', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96ae5b332ac', 429.00);
INSERT INTO `sale` VALUES (37, 1, '2020-04-15 01:49:23', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96ae73b7899', 429.00);
INSERT INTO `sale` VALUES (38, 1, '2020-04-15 01:50:14', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96aea638889', 429.00);
INSERT INTO `sale` VALUES (39, 1, '2020-04-15 01:51:23', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96aeeb2a864', 429.00);
INSERT INTO `sale` VALUES (40, 1, '2020-04-15 01:51:52', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96af086ff86', 429.00);
INSERT INTO `sale` VALUES (41, 1, '2020-04-15 01:52:14', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96af1e4ddad', 429.00);
INSERT INTO `sale` VALUES (42, 1, '2020-04-15 01:53:18', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96af5ed1816', 429.00);
INSERT INTO `sale` VALUES (43, 1, '2020-04-15 01:53:31', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96af6b350e4', 429.00);
INSERT INTO `sale` VALUES (44, 1, '2020-04-15 01:54:50', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96afbac3130', 429.00);
INSERT INTO `sale` VALUES (45, 1, '2020-04-15 01:55:00', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96afc416f51', 429.00);
INSERT INTO `sale` VALUES (46, 1, '2020-04-15 01:55:35', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96afe77b0f0', 429.00);
INSERT INTO `sale` VALUES (47, 1, '2020-04-15 02:00:06', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b0f696f4a', 429.00);
INSERT INTO `sale` VALUES (48, 1, '2020-04-15 02:02:12', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b174245b4', 429.00);
INSERT INTO `sale` VALUES (49, 1, '2020-04-15 02:02:34', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b18a03713', 429.00);
INSERT INTO `sale` VALUES (50, 1, '2020-04-15 02:03:32', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b1c48cc6f', 429.00);
INSERT INTO `sale` VALUES (51, 1, '2020-04-15 02:03:40', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b1cc20352', 429.00);
INSERT INTO `sale` VALUES (52, 1, '2020-04-15 02:04:04', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b1e4cc30d', 429.00);
INSERT INTO `sale` VALUES (53, 1, '2020-04-15 02:04:43', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b20b4bcd9', 429.00);
INSERT INTO `sale` VALUES (54, 1, '2020-04-15 02:05:29', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b239295df', 429.00);
INSERT INTO `sale` VALUES (55, 1, '2020-04-15 02:09:57', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b345dd31d', 429.00);
INSERT INTO `sale` VALUES (56, 1, '2020-04-15 02:10:15', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b357bc530', 429.00);
INSERT INTO `sale` VALUES (57, 1, '2020-04-15 02:10:58', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b38291934', 429.00);
INSERT INTO `sale` VALUES (58, 1, '2020-04-15 02:11:47', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b3b30d34f', 429.00);
INSERT INTO `sale` VALUES (59, 1, '2020-04-15 02:12:47', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b3ef7ffce', 429.00);
INSERT INTO `sale` VALUES (60, 1, '2020-04-15 02:13:26', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b4160c81e', 429.00);
INSERT INTO `sale` VALUES (61, 1, '2020-04-15 02:13:47', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b42bd58c3', 429.00);
INSERT INTO `sale` VALUES (62, 1, '2020-04-15 02:14:34', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b45a7d523', 429.00);
INSERT INTO `sale` VALUES (63, 1, '2020-04-15 02:18:04', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b52cc4966', 429.00);
INSERT INTO `sale` VALUES (64, 1, '2020-04-15 02:18:43', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b553339d2', 429.00);
INSERT INTO `sale` VALUES (65, 1, '2020-04-15 02:20:02', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b5a262654', 429.00);
INSERT INTO `sale` VALUES (66, 1, '2020-04-15 02:20:22', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b5b684a06', 429.00);
INSERT INTO `sale` VALUES (67, 1, '2020-04-15 02:20:55', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b5d702617', 429.00);
INSERT INTO `sale` VALUES (68, 1, '2020-04-15 02:22:11', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b6230ea0d', 429.00);
INSERT INTO `sale` VALUES (69, 1, '2020-04-15 02:22:33', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b63979d01', 429.00);
INSERT INTO `sale` VALUES (70, 1, '2020-04-15 02:24:43', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b6bb99fea', 429.00);
INSERT INTO `sale` VALUES (71, 1, '2020-04-15 02:35:12', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b93094bd5', 429.00);
INSERT INTO `sale` VALUES (72, 1, '2020-04-15 02:35:23', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b93ba6976', 429.00);
INSERT INTO `sale` VALUES (73, 1, '2020-04-15 02:36:04', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96b96435e14', 429.00);
INSERT INTO `sale` VALUES (74, 1, '2020-04-15 02:39:21', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96ba29a9140', 429.00);
INSERT INTO `sale` VALUES (75, 1, '2020-04-15 02:42:45', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96baf5abea4', 429.00);
INSERT INTO `sale` VALUES (76, 1, '2020-04-15 02:44:28', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96bb5c1312d', 429.00);
INSERT INTO `sale` VALUES (77, 1, '2020-04-15 02:46:27', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96bbd3d64b4', 429.00);
INSERT INTO `sale` VALUES (78, 1, '2020-04-15 02:46:50', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96bbea67fda', 429.00);
INSERT INTO `sale` VALUES (79, 1, '2020-04-15 02:49:21', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96bc81d4aca', 429.00);
INSERT INTO `sale` VALUES (80, 1, '2020-04-15 02:49:42', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96bc965efbc', 429.00);
INSERT INTO `sale` VALUES (81, 1, '2020-04-15 02:50:21', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96bcbd19e02', 429.00);
INSERT INTO `sale` VALUES (82, 1, '2020-04-15 02:51:52', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96bd18add78', 429.00);
INSERT INTO `sale` VALUES (83, 1, '2020-04-15 02:54:57', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96bdd1028b4', 429.00);
INSERT INTO `sale` VALUES (84, 1, '2020-04-15 03:05:05', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96c03108d95', 429.00);
INSERT INTO `sale` VALUES (85, 1, '2020-04-15 03:05:54', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96c062c1bad', 429.00);
INSERT INTO `sale` VALUES (86, 1, '2020-04-15 03:06:17', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96c079a580d', 429.00);
INSERT INTO `sale` VALUES (87, 1, '2020-04-15 03:08:00', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96c0e01f81e', 429.00);
INSERT INTO `sale` VALUES (88, 1, '2020-04-15 03:08:20', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96c0f4cd7e7', 429.00);
INSERT INTO `sale` VALUES (89, 1, '2020-04-15 03:11:10', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96c19e2cbb0', 429.00);
INSERT INTO `sale` VALUES (90, 1, '2020-04-15 03:11:48', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96c1c4365b7', 429.00);
INSERT INTO `sale` VALUES (91, 1, '2020-04-15 03:12:38', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96c1f60186e', 12.00);
INSERT INTO `sale` VALUES (92, 1, '2020-04-15 03:13:02', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96c20e961b5', 12.00);
INSERT INTO `sale` VALUES (93, 1, '2020-04-15 03:13:36', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96c230371a4', 12.00);
INSERT INTO `sale` VALUES (94, 1, '2020-04-15 03:15:54', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96c2baca1be', 12.00);
INSERT INTO `sale` VALUES (95, 1, '2020-04-15 03:20:09', 'mbqeme9v8a5fvq482mv5cis7kn', '5e96c3b94ae27', 12.00);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `passwd` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'erick', 'erick', 'erick', '4499113728', 'erickgtzh@gmail.com');

SET FOREIGN_KEY_CHECKS = 1;
