<?php 


require_once "_includes/connection.php";

require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();

// generate data by accessing properties
// echo $faker->name;
// echo "<br>";
//   // 'Lucy Cechtelar';
// echo $faker->address;
// echo "<br>";
//   // "426 Jordy Lodge
//   // Cartwrightshire, SC 88120-6700"
// echo $faker->text;
// echo "<br>";
//   // Dolores sit sint laboriosam dolorem culpa et autem. Beatae nam sunt fugit
//   // et sit et mollitia sed.
//   // Fuga deserunt tempora facere magni omnis. Omnis quia temporibus laudantium
//   // sit minima sint.

$database = new Connection();
$db = $database->open();

for ($i=1; $i < 10 ; $i++) { 
    
    $name = $faker->name;
    $mobileno = $faker->phoneNumber;
    $clientType = $faker->randomElement(['internal', 'external']);
    $client = $faker->randomElement(['Student', 'General Public']);
    $unit = $faker->randomElement(['CICT', 'N/A']);
    $sentence = $faker->catchPhrase;
    $comments = $faker->catchPhrase;
    $sem = $faker->randomElement(['1st', '2nd']);
    $acadyear = $faker->randomElement(['2015-2016', '2016-2017']);
    $visit = $faker->randomElement(['Only Today', 'Monthly', 'Daily', 'Weekly', 'Only Once']);
    
      try {
        $stmt = $db->prepare('INSERT INTO tbl_transactions (name, mobilenumber, clienttype, client, unit, purpose, comments, semester, acadyear, visit)
                            VALUES (:name, :mobilenumber, :clientType, :client, :unit, :purpose, :comments, :semester, :acadyear, :visit)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':mobilenumber', $mobileno);
        $stmt->bindParam(':clientType', $clientType);
        $stmt->bindParam(':client', $client);
        $stmt->bindParam(':unit', $unit);
        $stmt->bindParam(':purpose', $sentence);
        $stmt->bindParam(':comments', $comments);
        $stmt->bindParam(':semester', $sem);
        $stmt->bindParam(':acadyear', $acadyear);
        $stmt->bindParam(':visit', $visit);
        $stmt->execute();
    
        echo $lastInsertID = $db->lastInsertId();
        // $output['error'] = true;
        // $output['message'] = 'Success';

        for ($i=4; $i<=14 ; $i++) { 
            
            $tid = $lastInsertID;
            $iid = $i;
            $rating = $faker->numberBetween($min = 1, $max = 5);
            $stmt = $db->prepare('INSERT INTO tbl_ratings (tid_fk, iid_fk, rating) VALUES (:tid, :iid, :rating)');
            $stmt->bindParam(':tid', $tid);
            $stmt->bindParam(':iid', $iid );
            $stmt->bindParam(':rating', $rating);
            $stmt->execute();

        }
    
    } catch(PDOException $e){
        echo "There is some problem in connection: " . $e->getMessage();
    }


}