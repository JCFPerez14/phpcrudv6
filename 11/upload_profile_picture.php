<?php
session_start();
require_once('classes/database.php');
function updateUserProfilePicture($userID, $profilePicturePath) {
try {
    $con = $this->opencon();
    $con->beginTransaction();
    $query = $con->prepare("UPDATE users SET user_profile_picture = ? WHERE user_id = ?");
    $query->execute([$profilePicturePath, $userID]);
    // Update successful
    $con->commit();
    return true;
} catch (PDOException $e) {
    // Handle the exception (e.g., log error, return false, etc.)
     $con->rollBack();
    return false; // Update failed
}
 }