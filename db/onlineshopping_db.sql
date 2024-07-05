/*
 Navicat Premium Data Transfer

 Source Server         : root
 Source Server Type    : MySQL
 Source Server Version : 80033 (8.0.33)
 Source Host           : localhost:3306
 Source Schema         : onlineshopping_db

 Target Server Type    : MySQL
 Target Server Version : 80033 (8.0.33)
 File Encoding         : 65001

 Date: 04/07/2024 16:18:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for order_items
-- ----------------------------
DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items`  (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `orders_order_id` int NOT NULL,
  `products_product_id` int NOT NULL,
  `product_name` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_image` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `order_date` datetime NOT NULL,
  `product_price` decimal(10, 0) NOT NULL,
  `product_quantity` int NOT NULL,
  `users_user_id` int NOT NULL,
  PRIMARY KEY (`item_id`) USING BTREE,
  INDEX `fk_order_items_products1_idx`(`products_product_id` ASC) USING BTREE,
  INDEX `fk_order_items_orders1_idx`(`orders_order_id` ASC) USING BTREE,
  INDEX `fk_order_items_users1_idx`(`users_user_id` ASC) USING BTREE,
  CONSTRAINT `fk_order_items_orders1` FOREIGN KEY (`orders_order_id`) REFERENCES `orders` (`order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_order_items_products1` FOREIGN KEY (`products_product_id`) REFERENCES `products` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_order_items_users1` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_items
-- ----------------------------
INSERT INTO `order_items` VALUES (5, 3, 2, 'FUKUJE', 'cloth_1.jpg', '2024-06-27 07:06:44', 3200, 1, 1);
INSERT INTO `order_items` VALUES (6, 3, 3, 'Modern Cloth', 'cloth_2.jpg', '2024-06-27 07:06:44', 3500, 1, 1);
INSERT INTO `order_items` VALUES (7, 4, 2, 'FUKUJE', 'cloth_1.jpg', '2024-06-27 10:07:34', 3200, 1, 1);
INSERT INTO `order_items` VALUES (8, 5, 2, 'FUKUJE', 'cloth_1.jpg', '2024-06-27 10:45:28', 3200, 1, 1);
INSERT INTO `order_items` VALUES (39, 35, 2, 'FUKUJE', 'cloth_1.jpg', '2024-07-04 11:46:13', 3200, 1, 1);
INSERT INTO `order_items` VALUES (40, 35, 3, 'Modern Cloth', 'cloth_2.jpg', '2024-07-04 11:46:13', 3500, 1, 1);
INSERT INTO `order_items` VALUES (41, 36, 2, 'FUKUJE', 'cloth_1.jpg', '2024-07-04 12:05:39', 3200, 1, 1);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `order_cost` decimal(6, 2) NOT NULL,
  `users_user_id` int NOT NULL,
  `order_status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'on_hold',
  `user_phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_city` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `orderscol` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`) USING BTREE,
  INDEX `fk_orders_users_idx`(`users_user_id` ASC) USING BTREE,
  CONSTRAINT `fk_orders_users` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (3, 6700.00, 1, 'Not Paid', '715221982', 'Anuradhapura', 'LC 59 National Housing Scheme Airport road Anuradhapura', '2024-06-27 07:06:44', NULL);
INSERT INTO `orders` VALUES (4, 3200.00, 1, 'Not Paid', '715221982', 'Anuradhapura', 'LC 59 National Housing Scheme Airport road Anuradhapura', '2024-06-27 10:07:34', NULL);
INSERT INTO `orders` VALUES (5, 5700.00, 1, 'Not Paid', '715221982', 'Anuradhapura', 'LC 59 National Housing Scheme Airport road Anuradhapura', '2024-06-27 10:45:28', NULL);
INSERT INTO `orders` VALUES (6, 7500.00, 1, 'Not Paid', '715221982', 'Anuradhapura', 'LC 59 National Housing Scheme Airport road Anuradhapura', '2024-06-27 11:07:48', NULL);
INSERT INTO `orders` VALUES (7, 3200.00, 1, 'Not Paid', '715221982', 'Anuradhapura', 'LC 59 National Housing Scheme Airport road Anuradhapura', '2024-06-27 12:03:20', NULL);
INSERT INTO `orders` VALUES (8, 3200.00, 1, 'Not Paid', '715221982', 'Anuradhapura', 'LC 59 National Housing Scheme Airport road Anuradhapura', '2024-06-27 12:03:53', NULL);
INSERT INTO `orders` VALUES (9, 7500.00, 1, 'Not Paid', '715221982', 'Anuradhapura', 'LC 59 National Housing Scheme Airport road Anuradhapura', '2024-06-27 12:05:07', NULL);
INSERT INTO `orders` VALUES (35, 6700.00, 1, 'Not Paid', '773729462', 'Anuradhapura', 'LC 59 National Housing Scheme Airport road Anuradhapura', '2024-07-04 11:46:13', NULL);
INSERT INTO `orders` VALUES (36, 3200.00, 1, 'Not Paid', '773729462', 'Anuradhapura', 'LC 59 National Housing Scheme Airport road Anuradhapura', '2024-07-04 12:05:39', NULL);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_category` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_image2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `product_image3` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `product_image4` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `product_price` decimal(8, 2) NOT NULL,
  `product_special_offer` tinyint NOT NULL,
  `product_color` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`product_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'NIJKE', 'Full Suite', 'abc', 'cloth_4.jpg', 'cloth_4.jpg', 'cloth_4.jpg', 'cloth_4.jpg', 7500.00, 10, 'Black');
INSERT INTO `products` VALUES (2, 'FUKUJE', 'Full Suite', 'ABCD', 'cloth_1.jpg', 'cloth_2.jpg', 'cloth_2.jpg', 'cloth_2.jpg', 3200.00, 10, 'white');
INSERT INTO `products` VALUES (3, 'Modern Cloth', 'Fullsuite', 'abcd', 'cloth_2.jpg', 'cloth_3.jpg', 'cloth_3.jpg', 'cloth_3.jpg', 3500.00, 10, 'bg');
INSERT INTO `products` VALUES (4, 'Modern Cloth 2', 'Full Suite', 'acd', 'cloth_3.jpg', 'cloth_1.jpg', 'cloth_1.jpg', 'cloth_1.jpg', 5000.00, 10, 'bg');
INSERT INTO `products` VALUES (5, 'Urban Monkey', 'Cap', 'A baseball cap that became popular in the 1890s is a perfect mix of style and utility. It is one of the favorite designs in caps, and people wear them for reasons beyond their love for baseball. ', 'cap1.jpg', 'cap2.jpg', 'cap1.jpg', 'cap1.jpg', 3200.00, 10, 'Blue');
INSERT INTO `products` VALUES (6, 'Basket Ball Cap', 'Cap', 'A baseball cap that became popular in the 1890s is a perfect mix of style and utility. It is one of the favorite designs in caps, and people wear them for reasons beyond their love for baseball. ', 'cap2.jpg', 'cap2.jpg', 'cap2.jpg', 'cap2.jpg', 2500.00, 10, 'Ocean Blue');
INSERT INTO `products` VALUES (7, 'Base Ball Cap', 'Cap', 'A baseball cap that became popular in the 1890s is a perfect mix of style and utility. It is one of the favorite designs in caps, and people wear them for reasons beyond their love for baseball. ', 'cap3.jpg', 'cap3.jpg', 'cap3.jpg', 'cap3.jpg', 3000.00, 10, 'Black');
INSERT INTO `products` VALUES (8, 'NY Black', 'Cap', 'A baseball cap that became popular in the 1890s is a perfect mix of style and utility. It is one of the favorite designs in caps, and people wear them for reasons beyond their love for baseball. ', 'cap4.jpg', 'cap4.jpg', 'cap4.jpg', 'cap4.jpg', 2000.00, 10, 'Black');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  UNIQUE INDEX `UX_Constraint`(`user_email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Chandupa Jayalath', 'chandupajayalath20@gmail.com', '$2y$10$DHf22EWyojlInriQo9iwVeK2N27I5wcdL7B4MWvhKZaDZZY2YFzbK');

SET FOREIGN_KEY_CHECKS = 1;
