-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2018 at 07:59 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `madbatter`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `RecipeName` varchar(50) NOT NULL,
  `Author` varchar(50) NOT NULL DEFAULT 'admin@madbatter.com',
  `Category` varchar(50) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `PrepTime` int(11) NOT NULL,
  `CookTime` int(11) NOT NULL,
  `Serves` int(11) NOT NULL,
  `SkillLevel` varchar(20) NOT NULL,
  `RecipePicture` varchar(1000) DEFAULT NULL,
  `RecipeVideo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`RecipeName`, `Author`, `Category`, `Rating`, `Description`, `PrepTime`, `CookTime`, `Serves`, `SkillLevel`, `RecipePicture`, `RecipeVideo`) VALUES
('Heart brownie pops', 'admin@madbatter.com', 'Brownies', 4, 'An interesting spin on the trendy cake pops, these adorable pops are made of chocolate brownie. These are great fun to make with kids or gifted to your special loved one or secret valentine.', 25, 35, 20, 'Newbie', 'brownie5.jpg', 'https://www.youtube.com/embed/ZaK6R17ZPHg'),
('Nutella Cupcakes', 'admin@madbatter.com', 'Cupcakes', 4, 'These Nutella Cupcakes are sure to be a hit - the hazelnut flavour from the Nutella adds a new dimension. Not only are these delicious cupcakes filled with Nutella but the buttercream is subtly flavoured too. For those Nutella fans out there this is the cupcake recipe for you.', 20, 15, 14, 'Newbie', 'https://media.bakingmad.com/app_/responsive/BakingMad/media/content/Recipes/Nutella%20Cupcakes/Nutella-Cupcakes_Header.jpg', 'https://www.youtube.com/embed/70vr83NVDNs'),
('Super Cute Kawaii Cat Doughnuts ', 'admin@madbatter.com', 'Doughnuts', 3, 'These lovable cat doughnuts are really fun and easy to make and are a delicious treat! The recipe is for a baked doughnut rather than fried – it’s easy to pick up doughnut pans in store or online fairly cheaply. If you don’t have one you can make them in a cupcake tin – but, of course, there’ll be no hole! Alternatively, you can buy some ready-made doughnuts. If you want to add cheeks, you’ll need some pink candy melts.', 30, 9, 12, 'Newbie', 'https://media.bakingmad.com/app_/responsive/BakingMad/media/content/Recipes/Juliet%20Sear/Cat-Doughnuts_Header.jpg', 'https://www.youtube.com/embed/P66uzUNk438');

-- --------------------------------------------------------

--
-- Table structure for table `recipe-ingredients`
--

CREATE TABLE `recipe-ingredients` (
  `RecipeName` varchar(50) NOT NULL,
  `Ingredient` varchar(50) NOT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe-ingredients`
--

INSERT INTO `recipe-ingredients` (`RecipeName`, `Ingredient`, `Quantity`) VALUES
('Heart brownie pops', 'Butter ', 200),
('Heart brownie pops', 'Dark chocolate ', 550),
('Heart brownie pops', 'Egg(s) ', 3),
('Heart brownie pops', 'Flour', 50),
('Heart brownie pops', 'Sprinkle decorations', 5),
('Heart brownie pops', 'Sugar', 250),
('Nutella Cupcakes', 'Baking Powder', 14),
('Nutella Cupcakes', 'Caster Sugar', 165),
('Nutella Cupcakes', 'Cocoa Powder', 40),
('Nutella Cupcakes', 'Egg(s)', 3),
('Nutella Cupcakes', 'Flour', 115),
('Nutella Cupcakes', 'Icing Sugar', 350),
('Nutella Cupcakes', 'Milk', 40),
('Nutella Cupcakes', 'Nutella', 400),
('Nutella Cupcakes', 'Unsalted Butter', 350),
('Nutella Cupcakes', 'Water', 60),
('Super Cute Kawaii Cat Doughnuts ', 'Baking Powder', 8),
('Super Cute Kawaii Cat Doughnuts ', 'black soft peak Royal icing', 30),
('Super Cute Kawaii Cat Doughnuts ', 'Butter ', 30),
('Super Cute Kawaii Cat Doughnuts ', 'Buttermilk', 250),
('Super Cute Kawaii Cat Doughnuts ', 'Candy melts', 600),
('Super Cute Kawaii Cat Doughnuts ', 'Egg', 2),
('Super Cute Kawaii Cat Doughnuts ', 'Golden caster sugar ', 175),
('Super Cute Kawaii Cat Doughnuts ', 'Ground cinnamon', 2),
('Super Cute Kawaii Cat Doughnuts ', 'Plain flour', 200),
('Super Cute Kawaii Cat Doughnuts ', 'Vanilla extract', 4),
('Super Cute Kawaii Cat Doughnuts ', 'White sugar paste ', 30);

-- --------------------------------------------------------

--
-- Table structure for table `recipe-steps`
--

CREATE TABLE `recipe-steps` (
  `RecipeName` varchar(50) NOT NULL,
  `StepNo` int(11) NOT NULL,
  `Step` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe-steps`
--

INSERT INTO `recipe-steps` (`RecipeName`, `StepNo`, `Step`) VALUES
('Heart brownie pops', 1, 'Preheat the oven to 190°C (170°C, gas mark 5) and line a 25cm x 20cm baking tin with baking parchment.'),
('Heart brownie pops', 2, 'Melt the butter and chocolate together in a heatproof bowl over a pan of simmering water.'),
('Heart brownie pops', 3, 'Whisk the eggs until they are pale and fluffy, then add the sugar and whisk until thick, gently fold in the chocolate.'),
('Heart brownie pops', 4, 'Sieve in the flour and fold in until the mixture is smooth.'),
('Heart brownie pops', 5, 'Pour into the prepared tin and bake for 30-35 minutes until you see a paper-like crust on the surface and there should still be some movement in the centre of the tin.'),
('Heart brownie pops', 6, 'Remove from the oven and leave until completely cool.'),
('Heart brownie pops', 7, 'In a heatproof bowl over simmering water melt the chocolate. Then using a heart cutter cut heart shapes out of the cooled brownie.'),
('Heart brownie pops', 8, 'Dip a lollipop stick into the melted chocolate then slide it into the pointed end of the heart, leave to onside while you repeat this with the rest.'),
('Heart brownie pops', 9, 'Next carefully dip the hearts into the melted chocolate until they are entirely covered. Next sprinkle with sprinkle decorations.  Then either place onto baking parchment until set or stand upright in a cake pop stand.'),
('Nutella Cupcakes', 1, 'Begin by preparing a 12 hole cupcake tin with cupcake cases and preheating your oven to 200C (400F, Gas Mark 6)'),
('Nutella Cupcakes', 2, 'In a large bowl beat together the butter and sugar until light and fluffy.'),
('Nutella Cupcakes', 3, 'Add the eggs one by one, mixing in a tablespoon of the flour with each egg to avoid the mixture from curdling.'),
('Nutella Cupcakes', 4, 'In a separate bowl mix together the cocoa powder and boiling water to make a smooth paste.'),
('Nutella Cupcakes', 5, 'Add the flour and baking powder to the egg mixture followed by the cocoa paste and blend all the ingredients together until you reach a smooth batter.'),
('Nutella Cupcakes', 6, 'Spoon the mixture into each of the cupcake cases, filling each 2/3 full and bake in the oven for 12-15 minutes until springy to touch.'),
('Nutella Cupcakes', 7, 'Remove the cupcakes from the oven and allow to cool on a wire cooling rack. Whilst the cupcakes are cooling make your buttercream by beating together the butter, milk and half of the icing sugar.'),
('Nutella Cupcakes', 8, 'Once combined add the remaining icing sugar and Nutella and beat until light and fluffy. The longer that you beat the icing for the lighter it will be.'),
('Nutella Cupcakes', 9, 'When the cupcakes have cooled fully use a small sharp knife or an apple corer to carve out the centre of the sponge of each cupcake. Fill a piping bag with Nutella and pipe a small amount into the centre of each cake then top with the remaining sponge that you had removed.'),
('Nutella Cupcakes', 10, 'To finish your cupcakes, fill another piping bag with a star nozzle and your Nutella buttercream and pipe swirls on to the top of each cupcake. For an extra touch add a sprinkle of chopped hazelnuts to the top of the buttercream.\r\n'),
('Super Cute Kawaii Cat Doughnuts ', 1, 'Preheat the oven to 220C (430F/Gas 9). Lightly grease a 12-hole doughnut pan.'),
('Super Cute Kawaii Cat Doughnuts ', 2, 'Place all the dry ingredients together in a bowl and mix well with a whisk to distribute the spices and mix thoroughly.'),
('Super Cute Kawaii Cat Doughnuts ', 3, 'Add the wet ingredients and mix until combined. Try not to overmix.'),
('Super Cute Kawaii Cat Doughnuts ', 4, 'Pour the batter into a piping bag and fill the doughnut pan until it’s approximately three-quarters full. Do this in batches if necessary.'),
('Super Cute Kawaii Cat Doughnuts ', 5, 'Bake for 7–9 minutes until baked through and the tops are springy to the touch. Allow to cool for a couple of minutes, then turn out onto a wire rack to cool completely. '),
('Super Cute Kawaii Cat Doughnuts ', 6, 'While the doughnuts are cooling. Melt the white candy melts according to the packet instructions, or in a heatproof bowl over a pan of simmering water – do not allow the bowl to come into contact with the water.'),
('Super Cute Kawaii Cat Doughnuts ', 7, 'To make the little ears, mould small balls of sugar paste or marzipan to make cones – you’ll need 2 per doughnut.'),
('Super Cute Kawaii Cat Doughnuts ', 8, 'Dunk the ears in the melted candy and stick them to the top of each doughnut. Chill for 10 minutes in the freezer or 30 minutes in the fridge, keeping the remaining white candy warm.'),
('Super Cute Kawaii Cat Doughnuts ', 9, 'Dunk the ears in the melted candy and stick them to the top of each doughnut. Chill for 10 minutes in the freezer or 30 minutes in the fridge, keeping the remaining white candy warm.'),
('Super Cute Kawaii Cat Doughnuts ', 10, 'Dunk the doughnuts in the white candy to make the first coating. This will seal the ears in place. Pop onto a wire rack and allow to set for 10 minutes or so.'),
('Super Cute Kawaii Cat Doughnuts ', 11, 'Melt the coloured candy melts. Dip the cats into the colours for a cute two-tone effect. Leave to dry again on the rack.'),
('Super Cute Kawaii Cat Doughnuts ', 12, 'To finish, pipe on the whiskers, eyes and smile using black royal icing. These are best eaten on the day they are made.');

-- --------------------------------------------------------

--
-- Table structure for table `user-pantry`
--

CREATE TABLE `user-pantry` (
  `id` int(11) NOT NULL,
  `EmailID` varchar(50) NOT NULL,
  `Ingredient` varchar(50) NOT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user-pantry`
--

INSERT INTO `user-pantry` (`id`, `EmailID`, `Ingredient`, `Quantity`) VALUES
(4, 'bbowlands4@linkedin.com', 'Chocolate', 500),
(7, 'bbowlands4@linkedin.com', 'Flour', 1000),
(9, 'bbowlands4@linkedin.com', 'Nutella', 500),
(10, 'bbowlands4@linkedin.com', 'Water', 320),
(11, 'bbowlands4@linkedin.com', 'Yogurt', 500),
(13, 'pstott9@youtube.com', 'Water', 200),
(15, 'pstott9@youtube.com', 'Chocolate', 500),
(25, 'pstott9@youtube.com', 'Flour', 500),
(26, 'pstott9@youtube.com', 'Milk', 200),
(28, 'pstott9@youtube.com', 'Nutella', 800),
(29, 'pstott9@youtube.com', 'Baking Powder', 50),
(30, 'pstott9@youtube.com', 'Eggs', 3),
(31, 'pstott9@youtube.com', 'Pops', 23),
(34, 'admin@madbatter.com', 'Water', 500),
(37, 'bbowlands4@linkedin.com', 'Baking Powder', 50),
(40, 'vridhi13@yahoo.in', 'Dark Chocolate', 550),
(41, 'vridhi13@yahoo.in', 'Butter', 300),
(42, 'vridhi13@yahoo.in', 'Egg(s)', 3),
(43, 'vridhi13@yahoo.in', 'Flour', 500),
(44, 'vridhi13@yahoo.in', 'Sprinkle Decorations', 50),
(45, 'vridhi13@yahoo.in', 'Sugar', 600),
(46, 'vridhi13@yahoo.in', 'Baking Powder', 500),
(47, 'vridhi13@yahoo.in', 'Caster Sugar', 200),
(48, 'vridhi13@yahoo.in', 'Cocoa Powder', 50),
(49, 'vridhi13@yahoo.in', 'Icing Sugar', 250),
(50, 'vridhi13@yahoo.in', 'Milk', 40),
(51, 'vridhi13@yahoo.in', 'Nutella', 300),
(52, 'vridhi13@yahoo.in', 'Unsalted Butter', 350),
(53, 'vridhi13@yahoo.in', 'Water', 60),
(54, 'panktit@yahoo.com', 'Candy melts', 600),
(55, 'panktit@yahoo.com', 'black soft peak Royal icing', 30),
(56, 'panktit@yahoo.com', 'Baking Powder', 8),
(57, 'panktit@yahoo.com', 'Butter', 50),
(58, 'panktit@yahoo.com', 'Buttermilk', 250),
(59, 'panktit@yahoo.com', 'Golden caster sugar', 175),
(60, 'panktit@yahoo.com', 'Ground cinnamon', 2),
(61, 'panktit@yahoo.com', 'Vanilla extract', 4),
(63, 'panktit@yahoo.com', 'White sugar paste', 30),
(67, 'jack21@hotmail.com', 'Baking Powder', 500),
(70, 'swati1998@yahoo.in', 'Flour', 500),
(71, 'mtuminelli1@whitehouse.gov', 'Butter', 200),
(72, 'mtuminelli1@whitehouse.gov', 'Dark chocolate', 550),
(74, 'mtuminelli1@whitehouse.gov', 'Sprinkle decorations', 5),
(75, 'mtuminelli1@whitehouse.gov', 'Sugar', 250),
(77, 'rash10@hotmail.com', 'Biscuit', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user-profile`
--

CREATE TABLE `user-profile` (
  `EmailID` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `ProfilePicture` longblob,
  `Bio` varchar(1000) DEFAULT NULL,
  `Likes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user-profile`
--

INSERT INTO `user-profile` (`EmailID`, `Password`, `Username`, `FirstName`, `LastName`, `Age`, `Gender`, `ProfilePicture`, `Bio`, `Likes`) VALUES
('abc@gmail.com', 'abcdefghij', 'abc23', 'a', 'b', 9, 'Male', NULL, NULL, NULL),
('admin@madbatter.com', 'admin', 'admin', 'madbatter', 'admin', 20, 'Female', NULL, NULL, NULL),
('amit_24@hotmail.com', 'amitmishra', 'amit_24', 'Amit', 'Mishra', 10, 'Male', NULL, NULL, NULL),
('bbowlands4@linkedin.com', 'n7IQcv2sNeA', 'bbowlands4', 'Buffy', 'Bowlands', 71, 'Female', NULL, 'I am Buffy Bowlands and I love Baking!!!', NULL),
('bgibling6@wp.com', 'nNFg34T0', 'bgibling6', 'Brittani', 'Gibling', 56, 'Female', NULL, 'I am Brittani Gibling and I love Baking!!!', NULL),
('charrie2@free.fr', 'jCy43Uo', 'charrie2', 'Calypso', 'Harrie', 50, 'Female', NULL, NULL, NULL),
('cstrang7@list-manage.com', 'VBGlDR', 'cstrang7', 'Chad', 'Strang', 25, 'Female', NULL, NULL, NULL),
('dhruviv@yahoo.com', 'dhruvivadalia', 'dhruviv19', 'Dhruvi', 'Vadalia', 20, 'Female', NULL, NULL, NULL),
('dmechell0@hao123.com', 'aZdeaKZ0B', 'dmechell0', 'Daryle', 'Mechell', 18, 'Male', NULL, NULL, NULL),
('hcarloni3@nationalgeographic.com', 'hUROIGcm4G', 'hcarloni3', 'Hale', 'Carloni', 77, 'Male', NULL, NULL, NULL),
('jack21@hotmail.com', 'jacknjill', 'jacky21', 'Jack', 'Louis', 30, 'Male', NULL, NULL, NULL),
('mhuster8@4shared.com', '244h8FYIKdsj', 'mhuster8', 'Matthaeus', 'Huster', 27, 'Male', NULL, NULL, NULL),
('mtuminelli1@whitehouse.gov', '7kVQzSNZoo', 'mtuminelli1', 'Martainn', 'Tuminelli', 35, 'Male', NULL, NULL, NULL),
('panktit@yahoo.com', 'panktithakkar', 'panktit', 'Pankti', 'Thakkar', 20, 'Female', NULL, NULL, NULL),
('pstott9@youtube.com', 'X91x6nt', 'pstott9', 'Persis', 'Stott', 36, 'Female', NULL, 'I am Persis Stott and I love Baking!', NULL),
('random@gmail.com', 'random1234', 'random', 'r', 'd', 65, 'Male', NULL, NULL, NULL),
('rash10@hotmail.com', 'rash1077', 'rash10', 'Rash', 'P', 40, 'Female', NULL, NULL, NULL),
('swati1998@yahoo.in', '12345678', 'swati56', 'Swati', 'Shah', 42, 'Female', NULL, NULL, NULL),
('vridhi13@yahoo.in', 'vridhipatel', 'vridhi13', 'Vridhi', 'Patel', 19, 'Female', NULL, NULL, NULL),
('ydericota@hibu.com', 'q5A9RXnUc', 'ydericota', 'Yasmeen', 'Dericot', 38, 'Female', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`RecipeName`),
  ADD KEY `users-to-recipe-fk` (`Author`);

--
-- Indexes for table `recipe-ingredients`
--
ALTER TABLE `recipe-ingredients`
  ADD PRIMARY KEY (`RecipeName`,`Ingredient`),
  ADD KEY `recipe-to-ingredients-fk` (`RecipeName`);

--
-- Indexes for table `recipe-steps`
--
ALTER TABLE `recipe-steps`
  ADD PRIMARY KEY (`RecipeName`,`StepNo`),
  ADD KEY `recipe-to-steps-fk` (`RecipeName`);

--
-- Indexes for table `user-pantry`
--
ALTER TABLE `user-pantry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile-to-pantry-fk` (`EmailID`);

--
-- Indexes for table `user-profile`
--
ALTER TABLE `user-profile`
  ADD PRIMARY KEY (`EmailID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user-pantry`
--
ALTER TABLE `user-pantry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `users-to-recipe-fk` FOREIGN KEY (`Author`) REFERENCES `user-profile` (`EmailID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipe-ingredients`
--
ALTER TABLE `recipe-ingredients`
  ADD CONSTRAINT `recipe-ingredients_ibfk_1` FOREIGN KEY (`RecipeName`) REFERENCES `recipe` (`RecipeName`);

--
-- Constraints for table `recipe-steps`
--
ALTER TABLE `recipe-steps`
  ADD CONSTRAINT `recipe-steps_ibfk_1` FOREIGN KEY (`RecipeName`) REFERENCES `recipe` (`RecipeName`);

--
-- Constraints for table `user-pantry`
--
ALTER TABLE `user-pantry`
  ADD CONSTRAINT `user-pantry_ibfk_1` FOREIGN KEY (`EmailID`) REFERENCES `user-profile` (`EmailID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
