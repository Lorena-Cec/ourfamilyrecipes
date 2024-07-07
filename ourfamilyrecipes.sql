-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 09:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ourfamilyrecipes`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `picture_url` varchar(255) DEFAULT NULL,
  `meal_type` varchar(50) DEFAULT NULL,
  `ingredients` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `short_description`, `long_description`, `picture_url`, `meal_type`, `ingredients`) VALUES
(1, 'Chocolate Cake', 'Delicious chocolate cake', 'Preheat oven to 350º F. Prepare two 9-inch cake pans by spraying with baking spray or buttering and lightly flouring.\r\nAdd flour, sugar, cocoa, baking powder, baking soda, salt and espresso powder to a large bowl or the bowl of a stand mixer. Whisk through to combine or, using your paddle attachment, stir through flour mixture until combined well.\r\nAdd milk, vegetable oil, eggs, and vanilla to flour mixture and mix together on medium speed until well combined. Reduce speed and carefully add boiling water to the cake batter until well combined.\r\nDistribute cake batter evenly between the two prepared cake pans. Bake for 30-35 minutes, until a toothpick or cake tester inserted in the center of the chocolate cake comes out clean.\r\nRemove from the oven and allow to cool for about 10 minutes, remove from the pan and cool completely.\r\nFrost the cake with Chocolate Buttercream Frosting.\r\n', 'https://sugargeekshow.com/wp-content/uploads/2023/10/easy_chocolate_cake_slice-500x500.jpg', 'Dessert', '2 cups (240 g) all-purpose flour\r\n2 cups (396 g) sugar\r\n3/4 cup (63 g) unsweetened cocoa powder\r\n2 teaspoons (8 g) baking powder\r\n1 1/2 teaspoons (9 g) baking soda\r\n1 teaspoon (2.8 g) kosher salt\r\n1 teaspoon (2.3 g) espresso powder, homemade or store-bought\r\n1 cup (227 g) milk, or buttermilk, almond, or coconut milk\r\n1/2 cup (99 g) vegetable oil, or canola oil, or melted coconut oil\r\n2 large (100 g) eggs\r\n2 teaspoons (9.4 g) vanilla extract\r\n1 cup (227. g) boiling water'),
(2, 'Pancakes', 'Fluffy breakfast pancakes', 'These pancakes are light and fluffy, perfect for a breakfast treat...', 'https://www.inspiredtaste.net/wp-content/uploads/2024/03/Easy-Fluffy-Pancakes-Recipe-Video.jpg', 'Breakfast', '200ml milk\n100g flour\n2 eggs\n50g butter\n1 tsp baking powder'),
(3, 'Caesar Salad', 'Classic Caesar salad', 'A classic Caesar salad with crisp romaine lettuce and a creamy dressing...', 'https://s23209.pcdn.co/wp-content/uploads/2023/01/220905_DD_Chx-Caesar-Salad_051.jpg', 'Lunch', '200g romaine lettuce\n50g croutons\n30g parmesan cheese\n100ml Caesar dressing'),
(4, 'Spaghetti Carbonara', 'Creamy Italian pasta', 'A traditional Italian pasta dish made with eggs, cheese, pancetta, and pepper...', 'https://static01.nyt.com/images/2021/02/14/dining/carbonara-horizontal/carbonara-horizontal-square640-v2.jpg', 'Dinner', '200g spaghetti\n100g pancetta\n2 eggs\n50g parmesan cheese\n1 tsp black pepper'),
(5, 'Chicken Curry', 'Spicy chicken curry', 'A flavorful chicken curry with a rich and spicy sauce...', 'https://www.allrecipes.com/thmb/FL-xnyAllLyHcKdkjUZkotVlHR8=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/46822-indian-chicken-curry-ii-DDMFS-4x3-39160aaa95674ee395b9d4609e3b0988.jpg', 'Dinner', '500g chicken\n200ml coconut milk\n100g onions\n50g curry paste\n1 tsp garlic'),
(6, 'Vegetable Stir Fry', 'Quick and easy vegetable stir fry', 'A healthy and colorful vegetable stir fry with a savory sauce...', 'https://natashaskitchen.com/wp-content/uploads/2020/08/Vegetable-Stir-Fry-2.jpg', 'Lunch', '100g broccoli\n100g bell peppers\n100g carrots\n50g soy sauce\n1 tsp ginger'),
(7, 'Blueberry Muffins', 'Moist blueberry muffins', 'These blueberry muffins are moist and packed with fresh blueberries...', 'https://www.ambitiouskitchen.com/wp-content/uploads/2020/07/blueberrymuffins-4.jpg', 'Breakfast', '200g flour\n100g sugar\n100g blueberries\n100ml milk\n1 tsp baking powder'),
(8, 'Tomato Soup', 'Creamy tomato soup', 'Heat a nonreactive pot or enameled dutch oven over medium heat. Add butter then add chopped onions. Sauté 10-12 minutes, stirring occasionally, until softened and golden. Add minced garlic and sauté 1 minute until fragrant.\r\nAdd crushed tomatoes with their juice, chicken stock, chopped basil, sugar (or add sugar to taste), and black pepper. Stir together and bring to a boil then reduce heat, partially cover with lid and simmer for 10 minutes.\r\nYou can leave your soup with a chunky consistency, but if you like a blended/creamy soup, use an immersion blender to blend the soup in the pot to desired consistency or transfer to a blender in batches and blend until smooth (being careful not to over-fill the blender with hot liquid and pulse a few times initially to get it started), then return blended soup to the pot over medium heat.\r\nAdd 1/2 cup heavy cream, 1/3 cup freshly grated parmesan cheese and return to a simmer. Season to taste with salt and pepper if needed and turn off the heat.*\r\nLadle into warm bowls and top with more parmesan and chopped fresh basil.', 'https://www.allrecipes.com/thmb/QijITeBBcE99Ur5kDoccAJ35WWo=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/277311spicy-fresh-tomato-soupFranceC4x3-56454ad082214f33960f62665fc8c169.jpg', 'Lunch', '500g tomatoes\n100ml cream\n50g onions\n1 tsp garlic\n1 tsp basil'),
(9, 'Grilled Cheese Sandwich', 'Classic grilled cheese', 'A crispy and gooey grilled cheese sandwich...', 'https://natashaskitchen.com/wp-content/uploads/2021/08/Grilled-Cheese-Sandwich-SQ.jpg', 'Lunch', '2 slices bread\n50g cheddar cheese\n10g butter'),
(10, 'Beef Tacos', 'Spicy beef tacos', 'Tasty beef tacos with a spicy kick, served with fresh toppings...', 'https://danosseasoning.com/wp-content/uploads/2022/03/Beef-Tacos-768x575.jpg', 'Dinner', '200g ground beef\n50g taco seasoning\n100g lettuce\n50g cheese\n50g salsa'),
(11, 'Fruit Salad', 'Fresh fruit salad', 'A refreshing fruit salad with a mix of your favorite fruits...', 'https://www.modernhoney.com/wp-content/uploads/2023/05/Fruit-Salad-7.jpg', 'Dessert', '100g strawberries\n100g blueberries\n100g pineapple\n50g kiwi\n50g grapes'),
(12, 'Banana Bread', 'Best ever banana bread recipe', 'In a large bowl, mix the dry ingredients (flour, baking powder, cocoa - sifted, add sugar and salt).\r\n\r\nIn another bowl, blend mashed bananas (I pureed them with a hand blender), melted butter, and eggs.\r\n\r\nNow, take the bowl with the dry ingredients and gently mix in the wet ingredients using a hand mixer, then finally add chopped toasted almonds.\r\n\r\nPreheat the oven to 180°C (350°F).\r\n\r\nLine a loaf pan (approximately 2386 cm) with parchment paper or grease it with butter and dust with flour. Pour in the prepared chocolate bread batter.\r\n\r\nBake for 1 hour, check with a toothpick, and serve warm or at room temperature.\r\n\r\nI used 150 g of sugar and it was perfectly sufficient.', 'https://sallysbakingaddiction.com/wp-content/uploads/2018/10/homemade-banana-bread.jpg', 'Dessert', '230 g all-purpose flour\r\n1 baking powder\r\n30 g cocoa\r\n150 - 200 g sugar\r\na pinch of salt\r\n3 bananas\r\n125 g butter\r\n3 eggs\r\n50 g almonds or hazelnuts');

-- --------------------------------------------------------

--
-- Table structure for table `saved_recipes`
--

CREATE TABLE `saved_recipes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `saved_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saved_recipes`
--

INSERT INTO `saved_recipes` (`id`, `user_id`, `recipe_id`, `saved_at`) VALUES
(4, 9, 3, '2024-07-07 16:47:27'),
(5, 9, 2, '2024-07-07 16:50:54'),
(7, 8, 3, '2024-07-07 17:58:20'),
(8, 9, 12, '2024-07-07 19:09:03'),
(9, 8, 5, '2024-07-07 19:16:08'),
(10, 8, 1, '2024-07-07 19:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(8, '123', '$2y$10$hFJGg3MjAFWIl9WxwymesOjYi1O63sCUEThawvjxq2mX6F0.aG5BO'),
(9, 'admin', '$2y$10$wyo0tRbPtAmYAMEL9QwUN.fL.FqZE6ZUyaF45now0YWgedvl8ZhfO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_recipes`
--
ALTER TABLE `saved_recipes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_saved_recipe` (`user_id`,`recipe_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `saved_recipes`
--
ALTER TABLE `saved_recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `saved_recipes`
--
ALTER TABLE `saved_recipes`
  ADD CONSTRAINT `saved_recipes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `saved_recipes_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
