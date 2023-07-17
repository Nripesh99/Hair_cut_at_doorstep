<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
 <div>
    <form>
        <form method="post" action="agentregister.php">
            <label for="name">Name:</label>
  <input type="text" id="name" name="name" required><br><br>
  
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required><br><br>

  <label for="mobile_no">Mobile number:</label>
  <input type="text" id="Mobile_no" name="Mobile_no" required><br><br>
  
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required><br><br>
  
  <label for="location">Location:</label>
  <input type="text" id="location" name="location" required><br><br>
  
  <label for="booleanValue">Are you located inside ring road (yes or no)</label>
  <input type="checkbox" id="ring_road" name="ring_road"><br><br>
  
  <button type="submit" name="submit">Submit</button>

    </form>
 </div>
</body>
</html>