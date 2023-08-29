 <?php require_once __DIR__ . "/../../models/hotel.php"; ?>
 <?php require_once __DIR__ . "/../../include/addHotel.php" ?>
 <?php
    $newHotelInstance = new hotel($conn);
    $hotelItem = $newHotelInstance->displayHotels();
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title></title>
     <link rel="stylesheet" href="../../assets/css/fonts.css">
     <link rel="stylesheet" href="../../assets/css/staff/viewTab.css">
 </head>

 <body>
     <div class="heading">
         <h3>Hotels</h3>
     </div>

     <div class="addContainer">
         <form class="addForm" action="../../views/staff/landing.php?content=viewHotels" method="post">
             <div class="formItemContainer">
                 <div class="item">
                     <label>Name</label>
                     <input type="text" name="name" required>
                 </div>
                 <div class="item">
                     <label>Cost Per Night</label>
                     <input type="number" name="costPerNight" required>
                 </div>
             </div>
             <div class="formItemContainer">
                 <div class="item">
                     <label>Type</label>
                     <input type="text" name="type" required>
                 </div>
                 <div class="item">
                     <label>Beds</label>
                     <input type="number" name="beds" required>
                 </div>
             </div>
             <div class="formItemContainer">
                 <div class="item">
                     <label>Rating</label>
                     <input type="number" step="0.01" name="rating" required>
                 </div>
                 <div class="item">
                     <label>City</label>
                     <input type="text" name="city" required>
                 </div>
             </div>
             <div class="formItemContainer">
                 <div class="item" id="address">
                     <label>Address</label>
                     <input type="text" name="address" required>
                 </div>
             </div>
             <div class="submitContainer">
                 <input type="submit" value="Add">
             </div>
         </form>
     </div>

     <div class="tableContainer">
         <table>
             <tr class="headers">
                 <th>Hotel ID</th>
                 <th>Name</th>
                 <th>Cost Per Night</th>
                 <th>Beds</th>
                 <th>Type</th>
                 <th>Rating</th>
                 <th>City</th>
                 <th>Address</th>
                 <th>Actions</th>
             </tr>
             <?php foreach ($hotelItem as $hotel) : ?>
                 <tr>
                     <td><?php echo $hotel["hotel_id"]; ?></td>
                     <td><?php echo $hotel["name"]; ?></td>
                     <td><?php echo "R" . $hotel["cost_per_night"]; ?></td>

                     <td><?php echo $hotel["beds"] ?></td>
                     <td><?php echo $hotel["type"]; ?></td>
                     <td><?php echo $hotel["rating"]; ?></td>

                     <td><?php echo $hotel["city"]; ?></td>
                     <td><?php echo $hotel["address"]; ?></td>
                     <td>
                         <div class="actions">
                             <div class="updateContainer">
                                 <form action="../../views/staff/editHotel.php" method="post">
                                     <input type="hidden" name="hotelID" value="<?php echo $hotel["hotel_id"]; ?>">
                                     <button type="submit"><img src="../../assets/images/icons/editButton.png" alt="edit icon">
                                     </button>
                                 </form>
                             </div>
                             <div class="deleteContainer">
                                 <form action="../../include/deleteHotel.php" method="post">
                                     <input type="hidden" name="hotelID" value="<?php echo $hotel["hotel_id"]; ?>">
                                     <button type="submit"><img src="../../assets/images/icons/deleteButton.png" alt="delete icon">
                                     </button>
                                 </form>
                             </div>
                         </div>
                     </td>
                 </tr>
             <?php endforeach; ?>
         </table>
     </div>
 </body>

 </html>