<!DOCTYPE html>
<html>
<body>

<h1>Gym User Registration Form</h1>

<form action="user_login.php" method="post">

<fieldset>
  <legend>Account Information</legend>
  <table>
    <tr>
      <td><label for="user_name">Username:</label></td>
      <td><input type="text" id="user_name" name="user_name" required></td>
    </tr>
    <tr>
      <td><label for="email">Email Address:</label></td>
      <td><input type="email" id="email" name="email" required></td>
    </tr>
    <tr>
      <td><label for="password">Password:</label></td>
      <td><input type="password" id="password" name="password" required></td>
    </tr>
    <tr>
      <td><label for="confirm_password">Confirm Password:</label></td>
      <td><input type="password" id="confirm_password" name="confirm_password" required></td>
    </tr>
  </table>
</fieldset>

<fieldset>
  <legend>Personal Information</legend>
  <table>
    <tr>
      <td><label for="Address">Current Address:</label></td>
      <td><input type="text" id="Address" name="Address" required></td>
    </tr>
    <tr>
      <td><label for="Date_of_Birth">Date of Birth:</label></td>
      <td><input type="date" id="Date_of_Birth" name="Date_of_Birth" required></td>
    </tr>
    <tr>
      <td><label for="gender">Gender:</label></td>
      <td>
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label>
      </td>
    </tr>
    <tr>
      <td><label for="phone">Phone Number:</label></td>
      <td><input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required></td>
    </tr>
    <tr>
      <td><label for="Profile_Pic">Upload Photo:</label></td>
      <td><input type="file" id="Profile_Pic" name="Profile_Pic"></td>
    </tr>
  </table>
</fieldset>

<fieldset>
  <legend>Membership Details</legend>
  <table>
    <tr>
      <td><label for="membership">Select Membership Type:</label></td>
      <td>
        <select id="membership" name="membership">
          <option value="basic">Basic</option>
          <option value="standard">Standard</option>
          <option value="premium">Premium</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><label for="trainer">Personal Trainer Required?</label></td>
      <td>
        <input type="radio" id="yes" name="trainer" value="yes">
        <label for="yes">Yes</label>
        <input type="radio" id="no" name="trainer" value="no">
        <label for="no">No</label>
      </td>
    </tr>
  </table>
</fieldset>

<fieldset>
  <legend>Workout Preferences</legend>
  <label>Select Preferred Workout Days:</label>
  <table>
    <tr><td><input type="checkbox" id="saturday" name="saturday" value="Saturday"> <label for="saturday">Saturday</label></td></tr>
    <tr><td><input type="checkbox" id="sunday" name="sunday" value="Sunday"> <label for="sunday">Sunday</label></td></tr>
    <tr><td><input type="checkbox" id="monday" name="monday" value="Monday"> <label for="monday">Monday</label></td></tr>
    <tr><td><input type="checkbox" id="tuesday" name="tuesday" value="Tuesday"> <label for="tuesday">Tuesday</label></td></tr>
    <tr><td><input type="checkbox" id="wednesday" name="wednesday" value="Wednesday"> <label for="wednesday">Wednesday</label></td></tr>
    <tr><td><input type="checkbox" id="thursday" name="thursday" value="Thursday"> <label for="thursday">Thursday</label></td></tr>
    <tr><td><input type="checkbox" id="friday" name="friday" value="Friday"> <label for="friday">Friday</label></td></tr>
  </table>
  <table>
    <tr>
      <td><label for="appt">Preferred Workout Time:</label></td>
      <td><input type="time" id="appt" name="appt"></td>
    </tr>
  </table>
</fieldset>

<input type="submit" value="Submit">

</form>

</body>
</html>
