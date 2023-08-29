-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 12:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel-reservation-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `days` int(11) NOT NULL,
  `total_cost` bigint(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `cost_per_night` decimal(10,2) NOT NULL,
  `description` varchar(500) NOT NULL,
  `beds` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `rating` decimal(3,2) NOT NULL,
  `features` varchar(255) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `images` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `name`, `thumbnail`, `cost_per_night`, `description`, `beds`, `type`, `rating`, `features`, `city`, `address`, `images`) VALUES
(1, 'Bellgrove Guest House', './assets/images/hotels/jhb/bellgrove/thumbnail.jpg', 1235.00, 'Set in Johannesburg, Bellgrove Guest House Sandton has a number of amenities including a garden and free WiFi. Featuring a shared kitchen, this property also provides guests with a restaurant. Guests can make use of a terrace.', 2, 'Guesthouse', 4.73, 'Outdoor swimming pool\r\nFree WiFi\r\nAirport shuttle\r\nFree parking\r\nFamily rooms\r\nNon-smoking rooms\r\nRoom service\r\nTea/coffee maker in all rooms\r\nBar\r\nFabulous breakfast', 'Johannesburg', '8B Trebyan Avenue, Rivonia, 2128', '../../assets/images/hotels/jhb/bellgrove/1.jpg\n../../assets/images/hotels/jhb/bellgrove/2.jpg\n../../assets/images/hotels/jhb/bellgrove/3.jpg\n../../assets/images/hotels/jhb/bellgrove/4.jpg\n'),
(2, 'Burkleigh House', './assets/images/hotels/jhb/burkleigh/thumbnail.jpg\r\n', 1193.00, 'Set in Johannesburg, Bellgrove Guest House Sandton has a number of amenities including a garden and free WiFi. Featuring a shared kitchen, this property also provides guests with a restaurant. Guests can make use of a terrace.', 2, 'Guesthouse', 4.51, 'Outdoor swimming pool\r\nNon-smoking rooms\r\nFree WiFi\r\nGarden\r\nBBQ facilities\r\nLaundry\r\nTerrace\r\nExceptional breakfast', 'Johannesburg', '327 Pine Ave Ferndale, Randburg, 2194', '../../assets/images/hotels/jhb/burkleigh/1.jpg\r\n../../assets/images/hotels/jhb/burkleigh/2.jpg\r\n../../assets/images/hotels/jhb/burkleigh/3.jpg\r\n../../assets/images/hotels/jhb/burkleigh/4.jpg'),
(3, 'Hyde Park Guesthouse', './assets/images/hotels/jhb/hyde_park/thumbnail.jpg\r\n', 1750.00, 'Conveniently situated in the leafy suburb of Hyde Park and 3 km away from Sandton, Hyde Park Guest House offers luxurious accommodation and a pool. Johannesburg is 10 km away.', 2, 'Guesthouse', 4.89, 'Outdoor swimming pool\r\nAirport shuttle\r\nNon-smoking rooms\r\nFree parking\r\nFree WiFi\r\nFamily rooms\r\nTea/coffee maker in all rooms\r\nBar\r\nExceptional breakfast\r\nChildren\'s cots (upon request)', 'Johannesburg', '28 B, 3rd Road, Hyde Park, Sandton, 2196', '../../assets/images/hotels/jhb/hyde_park/1.jpg\r\n../../assets/images/hotels/jhb/hyde_park/2.jpg\r\n../../assets/images/hotels/jhb/hyde_park/3.jpg\r\n../../assets/images/hotels/jhb/hyde_park/4.jpg'),
(4, 'Home Suite Hotel', './assets/images/hotels/jhb/home_suite/thumbnail.jpg\r\n', 1690.00, 'Home Suite Hotels Rosebank features accommodation set in Rosebank and situated less than 1 km from Rosebank Gautrain station, Home Suite Hotels Bristol Rosebank offers accommodation for any discerning guest travelling for either business or leisure.', 2, 'Hotel', 4.35, 'Outdoor swimming pool\r\nNon-smoking rooms\r\nFree parking\r\nRoom service\r\nFree WiFi\r\nRestaurant\r\nTea/coffee maker in all rooms\r\nBar\r\nSuperb breakfast\r\nChildren\'s cots (upon request)', 'Johannesburg', '50 Bristol Road, corner Oxford Rd, Rosebank, Saxonwold, 2196', '../../assets/images/hotels/jhb/home_suite/1.jpg\r\n../../assets/images/hotels/jhb/home_suite/2.jpg\r\n../../assets/images/hotels/jhb/home_suite/3.jpg\r\n../../assets/images/hotels/jhb/home_suite/4.jpg'),
(5, 'Park Central Residence', './assets/images/hotels/jhb/park_central/thumbnail.jpg\r\n', 1134.00, 'Located in Johannesburg in the Gauteng region, The Park Central Residence provides accommodation with free WiFi and free private parking.', 2, 'Hotel', 4.88, 'Outdoor swimming pool\r\nAirport shuttle\r\nNon-smoking rooms\r\nFree parking\r\nFree WiFi\r\nFamily rooms', 'Johannesburg', '6 Keyes Avenue Park Central, 2196', '../../assets/images/hotels/jhb/park_central/1.jpg\r\n../../assets/images/hotels/jhb/park_central/2.jpg\r\n../../assets/images/hotels/jhb/park_central/3.jpg\r\n../../assets/images/hotels/jhb/park_central/4.jpg'),
(6, '@Sandton Hotel', './assets/images/hotels/jhb/@sandton/thumbnail.jpg\r\n', 1530.00, '@Sandton Hotel features an outdoor swimming pool, garden, a restaurant and bar in Johannesburg. The property is set 1.5 km from Gautrain Sandton Station, 2 km from Sandton City Mall and 10 km from Parkview Golf Club. The accommodation offers a 24-hour front desk, airport transfers, room service and free WiFi.', 2, 'Hotel', 4.56, 'Outdoor swimming pool\r\nAirport shuttle\r\nNon-smoking rooms\r\nParking on site\r\nSpa and wellness centre\r\nRoom service\r\nFitness centre\r\nTea/coffee maker in all rooms\r\nBar\r\nVery good breakfast', 'Johannesburg', '5 Benmore Road, Sandton, 2196', '../../assets/images/hotels/jhb/@sandton/1.jpg\r\n../../assets/images/hotels/jhb/@sandton/2.jpg\r\n../../assets/images/hotels/jhb/@sandton/3.jpg\r\n../../assets/images/hotels/jhb/@sandton/4.jpg'),
(7, 'Coral Tree Inn', './assets/images/hotels/pta/coral_tree/thumbnail.jpg\r\n', 1232.00, 'Located in the heart of Waterkloof Heights Security Estate, Coral Tree Inn offers elegantly decorated rooms with balconies. Overlooking a natural park it features an outdoor pool and free Wi-Fi. Sun Arena at Time Square Casino is 4.7 km away, while Atterbury Theatre is 6.1 km away.', 2, 'Guesthouse', 4.46, 'Outdoor swimming pool\r\nNon-smoking rooms\r\nFree parking\r\nFree WiFi\r\nFamily rooms\r\nBBQ facilities\r\nTea/coffee maker in all rooms\r\nBar\r\nVery good breakfast', 'Pretoria', '69 Korannaberg Road, Waterkloof Heights, 0181', '../../assets/images/hotels/pta/coral_tree/1.jpg\r\n../../assets/images/hotels/pta/coral_tree/2.jpg\r\n../../assets/images/hotels/pta/coral_tree/3.jpg\r\n../../assets/images/hotels/pta/coral_tree/4.jpg'),
(8, 'Casa Toscana', './assets/images/hotels/pta/toscana/thumbnail.jpg', 1276.00, 'Featuring air-conditioned rooms and a terrace, Casa Toscana Lodge is located in a quiet area in Lynnwood, 800 metres from the centre. WiFi is available in all areas and is free of charge.', 2, 'Guesthouse', 4.78, 'Outdoor swimming pool\r\nNon-smoking rooms\r\nAirport shuttle\r\nFree parking\r\nSpa and wellness centre\r\nRoom service\r\nFacilities for disabled guests\r\nTea/coffee maker in all rooms\r\nBar\r\nGood breakfast', 'Pretoria', '5 Darlington Road, 0081', '../../assets/images/hotels/pta/toscana/1.jpg\r\n../../assets/images/hotels/pta/toscana/2.jpg\r\n../../assets/images/hotels/pta/toscana/3.jpg\r\n../../assets/images/hotels/pta/toscana/4.jpg'),
(9, 'Pierneef\'s Kraal', './assets/images/hotels/pta/kraal/thumbnail.jpg', 1555.00, 'Situated in Pretoria, 9 km from University of Pretoria, Pierneef\'s Kraal features accommodation with a shared lounge, free private parking, a garden and barbecue facilities. Boasting family rooms, this property also provides guests with a sun terrace. Rooms are equipped with a patio with garden views and free WiFi.', 2, 'Guesthouse', 4.23, 'Non-smoking rooms\r\nAirport shuttle\r\nFree parking\r\nFree WiFi\r\nFamily rooms\r\nTea/coffee maker in all rooms\r\nExceptional breakfast', 'Pretoria', '30 Knoppiesdoorn Avenue, 0081', '../../assets/images/hotels/pta/kraal/1.jpg\r\n../../assets/images/hotels/pta/kraal/2.jpg\r\n../../assets/images/hotels/pta/kraal/3.jpg\r\n../../assets/images/hotels/pta/kraal/4.jpg'),
(10, 'Regency Apartment Hotel', './assets/images/hotels/pta/regency/thumbnail.jpg', 1936.00, 'Featuring a sun terrace with a swimming pool, as well as a bar, The Regency Apartment Hotel Menlyn is located in Pretoria. With free WiFi, this 4-star hotel offers a 24-hour front desk and is a 4-minute drive from Menlyn Park Shopping Centre.', 2, 'Hotel', 4.67, 'Outdoor swimming pool\r\nNon-smoking rooms\r\nAirport shuttle\r\nFree parking\r\nFree WiFi\r\nRoom service\r\nFitness centre\r\nTea/coffee maker in all rooms\r\nBar\r\nGood breakfast', 'Pretoria', '27 Matroosberg Road, 0081', '../../assets/images/hotels/pta/regency/1.jpg\r\n../../assets/images/hotels/pta/regency/2.jpg\r\n../../assets/images/hotels/pta/regency/3.jpg\r\n../../assets/images/hotels/pta/regency/4.jpg'),
(11, 'Protea Hotel', './assets/images/hotels/pta/protea/thumbnail.jpg', 1835.00, 'Set in Pretoria, 2 km from University of Pretoria, Protea Hotel by Marriott Pretoria Loftus Park has an outdoor swimming pool and a terrace. Featuring a 24-hour front desk, this smoke-free property also provides guests with a restaurant. The property is non-smoking throughout and is situated 2.3 km from Union Buildings.', 2, 'Hotel', 4.52, 'Outdoor swimming pool\r\nNon-smoking rooms\r\nAirport shuttle\r\nFree parking\r\nFitness centre\r\nRoom service\r\nFacilities for disabled guests\r\nTea/coffee maker in all rooms\r\nBar\r\nVery good breakfast', 'Pretoria', '416 Kirkness Street, , Arcadia, 0007', '../../assets/images/hotels/pta/protea/1.jpg\r\n../../assets/images/hotels/pta/protea/2.jpg\r\n../../assets/images/hotels/pta/protea/3.jpg\r\n../../assets/images/hotels/pta/protea/4.jpg'),
(12, 'The Rasmus', './assets/images/hotels/pta/rasmus/thumbnail.jpg', 1931.00, 'Set in Pretoria, 5.9 km from Pretoria Country Club, The Rasmus offers accommodation with a garden, free private parking, a terrace and a restaurant. With free WiFi, this 5-star hotel offers room service and a concierge service. Guests can have a drink at the bar', 2, 'Hotel', 4.87, 'Non-smoking rooms\nFree parking\nFree WiFi\nRoom service\nRestaurant\nTea/coffee maker in all rooms\nBar\nSuperb breakfast', 'Pretoria', 'Solomon Mahlangu Drive, Erasmus Park, 0048', '../../assets/images/hotels/pta/rasmus/1.jpg\r\n../../assets/images/hotels/pta/rasmus/2.jpg\r\n../../assets/images/hotels/pta/rasmus/3.jpg\r\n../../assets/images/hotels/pta/rasmus/4.jpg'),
(13, 'Vetho Villa', './assets/images/hotels/cpt/vetho/thumbnail.jpg', 3100.00, 'Situated in Camps Bay, Vetho Villa features panoramic views of the Atlantic Ocean and the Twelve Apostles. The grounds include an outdoor pool with a sun terrace and the beachfront is 200 metres away.', 2, 'Guesthouse', 4.56, 'Indoor swimming pool\r\nFree WiFi\r\nAirport shuttle\r\nBeachfront\r\nNon-smoking rooms\r\nBBQ facilities\r\nTerrace\r\nGarden\r\nDaily housekeeping\r\nLaundry', 'Cape Town', '15 Van Kamp Street, Camps Bay, 800', '../../assets/images/hotels/cpt/vetho/1.jpg\r\n../../assets/images/hotels/cpt/vetho/2.jpg\r\n../../assets/images/hotels/cpt/vetho/3.jpg\r\n../../assets/images/hotels/cpt/vetho/4.jpg'),
(14, 'Camps Bay Villa', './assets/images/hotels/cpt/camps_bay/thumbnail.jpg', 6000.00, 'Camps Bay Villa is situated on the upper slopes of Camps Bay, bordering Table Mountain National Park and offering stunning views over the Atlantic Ocean and the beach.', 2, 'Guesthouse', 4.89, '3 swimming pools\r\nFree parking\r\nFree WiFi\r\nFamily rooms\r\nAirport shuttle\r\nNon-smoking rooms\r\nRoom service\r\nTerrace\r\nGarden\r\nTea/coffee maker in all rooms', 'Cape Town', '48 Francolin Road, Camps Bay, 8040 ', '../../assets/images/hotels/cpt/camps_bay/1.jpg\r\n../../assets/images/hotels/cpt/camps_bay/2.jpg\r\n../../assets/images/hotels/cpt/camps_bay/3.jpg\r\n../../assets/images/hotels/cpt/camps_bay/4.jpg'),
(15, 'Parker Cottage', './assets/images/hotels/cpt/parker/thumbnail.jpg', 2563.00, 'Close to Cape Towns attractions, this 4-star guest house at the foot of Table Mountain offers cosy and beautiful rooms, free WiFi, and excellent services.', 2, 'Guesthouse', 4.78, 'Free parking\r\nFree WiFi\r\nFamily rooms\r\nAirport shuttle\r\nNon-smoking rooms\r\nTerrace\r\nGarden\r\nDaily housekeeping\r\nLaundry', 'Cape Town', '3 Carstens Street, Tamboerskloof, 8001', '../../assets/images/hotels/cpt/parker/1.jpg\r\n../../assets/images/hotels/cpt/parker/2.jpg\r\n../../assets/images/hotels/cpt/parker/3.jpg\r\n../../assets/images/hotels/cpt/parker/4.jpg'),
(16, 'O\'Two Hotel', './assets/images/hotels/cpt/o_two/thumbnail.jpg', 4609.00, 'Located in Cape Town, 200 metres from Mouille Point Beach, O\' Two Hotel provides accommodation with free bikes, free private parking, an outdoor swimming pool and a fitness centre. 800 metres from Three Anchor Bay Beach and 1.3 km from Rocklands Beach, the property offers a terrace and a bar. The accommodation features a 24-hour front desk, airport transfers, room service and free WiFi throughout the property.', 2, 'Hotel', 4.67, 'Outdoor swimming pool\r\nFree parking\r\nFree WiFi\r\nFamily rooms\r\nAirport shuttle\r\nNon-smoking rooms\r\nSpa and wellness centre\r\nTea/coffee maker in all rooms\r\nBar\r\nVery good breakfast', 'Cape Town', '3 Surrey Place, Mouille Point, 8005', '../../assets/images/hotels/cpt/o_two/1.jpg\r\n../../assets/images/hotels/cpt/o_two/2.jpg\r\n../../assets/images/hotels/cpt/o_two/3.jpg\r\n../../assets/images/hotels/cpt/o_two/4.jpg'),
(17, 'Primi Seacastle', './assets/images/hotels/cpt/primi/thumbnail.jpg', 2187.00, 'Only 10 minutes from Cape Town’s city centre, Primi Seacastle provides you with a deluxe home away from home. Kick off your shoes and relax at the poolside. A pre-arranged barbecue, followed by sundowners, is the ideal way to start your evening in style. ', 2, 'Hotel', 4.76, 'Airport shuttle\r\nNon-smoking rooms\r\nRoom service\r\nFree WiFi\r\nBeachfront\r\nBBQ facilities\r\nTea/coffee maker in all rooms\r\nBar\r\nVery good breakfast\r\nChildren\'s cots (upon request)', 'Cape Town', '17 Strathmore Lane, Camps Bay, 8004', '../../assets/images/hotels/cpt/primi/1.jpg\r\n../../assets/images/hotels/cpt/primi/2.jpg\r\n../../assets/images/hotels/cpt/primi/3.jpg\r\n../../assets/images/hotels/cpt/primi/4.jpg'),
(18, 'Old Foundry Hotel', './assets/images/hotels/cpt/old_foundry/thumbnail.jpg', 1629.00, 'Boasting a fitness centre, a restaurant as well as a bar, Old Foundry Hotel is set in the centre of Cape Town, 2.1 km from Mouille Point Beach. Featuring room service, this property also provides guests with a sun terrace. The accommodation offers a 24-hour front desk, airport transfers, a shared kitchen and free WiFi throughout the property.', 2, 'Hotel', 4.66, 'Free parking\nFree WiFi\nAirport shuttle\nNon-smoking rooms\nFitness centre\nRestaurant\nRoom service\n24-hour front desk\nTea/coffee maker in all rooms\nVery good breakfast', 'Cape Town', '16 Ebenezer Road, 8001', '../../assets/images/hotels/cpt/old_foundry/1.jpg\r\n../../assets/images/hotels/cpt/old_foundry/2.jpg\r\n../../assets/images/hotels/cpt/old_foundry/3.jpg\r\n../../assets/images/hotels/cpt/old_foundry/4.jpg'),
(19, 'Goble Palms', './assets/images/hotels/dbn/goble/thumbnail.jpg', 1233.00, 'Nestled in upper Morningside, Goble Palms Guest Lodge & Urban Retreat features an outdoor pool, an English-style pub, and a colonial rooftop terrace overlooking Durban and the Indian Ocean. The boutique-style rooms are decorated with a mix of antique and contemporary décor. They feature air conditioning, a satellite TV, tea and coffee making facilities and free Wi-Fi.', 2, 'Guesthouse', 4.83, 'Outdoor swimming pool\r\nFree parking\r\nFree WiFi\r\nAirport shuttle\r\nNon-smoking rooms\r\nBBQ facilities\r\n24-hour front desk\r\nTerrace\r\nBar\r\nTea/coffee maker in all rooms', 'Durban', '120 Goble Road, Morningside, 4001', '../../assets/images/hotels/dbn/goble/1.jpg\r\n../../assets/images/hotels/dbn/goble/2.jpg\r\n../../assets/images/hotels/dbn/goble/3.jpg\r\n../../assets/images/hotels/dbn/goble/4.jpg'),
(20, 'Ocean Vista', './assets/images/hotels/dbn/ocean_vista/thumbnail.jpg', 2600.00, 'Located within 2.4 km of Gateway Shoppertainment World, Ocean Vista Boutique Guest House in Durban provides ocean view from the deck and rooms with free WiFi. Set 3.7 km from Umhlanga Ridge and La Lucia Ridge Office Park, the hotel is also 13 km away from the Durban ICC.', 2, 'Guesthouse', 4.86, 'Outdoor swimming pool\r\nFree parking\r\nFree WiFi\r\nAirport shuttle\r\nNon-smoking rooms\r\nBBQ facilities\r\nTerrace\r\nTea/coffee maker in all rooms', 'Durban', '28 Ridge Road, 4051', '../../assets/images/hotels/dbn/ocean_vista/1.jpg\r\n../../assets/images/hotels/dbn/ocean_vista/2.jpg\r\n../../assets/images/hotels/dbn/ocean_vista/3.jpg\r\n../../assets/images/hotels/dbn/ocean_vista/4.jpg'),
(21, 'Sandals', './assets/images/hotels/dbn/sandals/thumbnail.jpg', 2003.00, 'Offering a year-round outdoor pool, Sandals Guest House is situated in Durban in the KwaZulu-Natal Region. Free WiFi is available throughout the property and free private parking is available on site. Every room at this guest house is air conditioned and is equipped with a flat-screen TV. Some units have a seating area for your convenience.', 2, 'Guesthouse', 4.64, 'Outdoor swimming pool\r\nFree parking\r\nFree WiFi\r\nAirport shuttle\r\nNon-smoking rooms\r\nRoom service\r\nFacilities for disabled guests\r\nBBQ facilities\r\nBar\r\nPrivate beach area', 'Durban', '39 Chartwell Drive, 4320', '../../assets/images/hotels/dbn/sandals/1.jpg\r\n../../assets/images/hotels/dbn/sandals/2.jpg\r\n../../assets/images/hotels/dbn/sandals/3.jpg\r\n../../assets/images/hotels/dbn/sandals/4.jpg'),
(22, 'Premier Hotel', './assets/images/hotels/dbn/premier/thumbnail.jpg', 1750.00, 'Set in Durban, 2.6 km from Umhlanga Main Beach, Premier Hotel Umhlanga offers accommodation with a terrace, free private parking, a restaurant and a bar. This 4-star hotel offers room service and a 24-hour front desk. The property is non-smoking and is located 2.8 km from Umhlanga rocks Beach.', 2, 'Hotel', 4.57, 'Outdoor swimming pool\r\nFree parking\r\nAirport shuttle\r\nNon-smoking rooms\r\nRestaurant\r\nRoom service\r\n24-hour front desk\r\nTerrace\r\nTea/coffee maker in all rooms\r\nGood breakfast', 'Durban', '3-7 Umhlanga Ridge Blvd, Umhlanga, 4319', '../../assets/images/hotels/dbn/premier/1.jpg\r\n../../assets/images/hotels/dbn/premier/2.jpg\r\n../../assets/images/hotels/dbn/premier/3.jpg\r\n../../assets/images/hotels/dbn/premier/4.jpg'),
(23, 'Blue Waters Hotel', './assets/images/hotels/dbn/blue_waters/thumbnail.jpg', 1394.00, 'Opposite Durban’s famous beachfront, Blue Waters Hotel is within walking distance of the Suncoast Casino and the iconic Moses Mabhida Stadium. Both uShaka Marine World and Greyville Racecourse are within 4 km from the property.', 2, 'Hotel', 4.78, '2 swimming pools\r\nPrivate parking\r\nFamily rooms\r\nFree WiFi\r\nBeachfront\r\nNon-smoking rooms\r\nRestaurant\r\nTea/coffee maker in all rooms\r\nBar\r\nFabulous breakfast', 'Durban', '175 Snell Parade, Marine Parade, 4056', '../../assets/images/hotels/dbn/blue_waters/1.jpg\r\n../../assets/images/hotels/dbn/blue_waters/2.jpg\r\n../../assets/images/hotels/dbn/blue_waters/3.jpg\r\n../../assets/images/hotels/dbn/blue_waters/4.jpg'),
(24, 'Belaire Suites Hotel', './assets/images/hotels/dbn/belaire/thumbnail.jpg', 1367.00, 'Located right on Durbans North Beach, Belaire Suites Hotel offers rooms with free WiFi. Durban Station is 1 km away, and the on-site Café Jiran serves award winning coffee. Greyville Racecourse and uShaka Marine World are within 4 km from the property.', 2, 'Hotel', 4.91, 'Private parking\r\nFamily rooms\r\nFree WiFi\r\nBeachfront\r\nAirport shuttle\r\nNon-smoking rooms\r\nRestaurant\r\nRoom service\r\nFacilities for disabled guests\r\nBar', 'Durban', '151 Snell Parade, North Beach, Marine Parade, 4056', '../../assets/images/hotels/dbn/belaire/1.jpg\r\n../../assets/images/hotels/dbn/belaire/2.jpg\r\n../../assets/images/hotels/dbn/belaire/3.jpg\r\n../../assets/images/hotels/dbn/belaire/4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `customers_ibfk_1` (`user_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
