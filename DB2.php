<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
        echo "<pre>";
        echo "<h3>The SQL Operations Performed:</h3><br>";
        
        $statemnt=$_POST['statemnt'];
        $values=$_POST['values'];
        $updateValues=$_POST['updateValues'];
        $updateSql=$_POST['updateSql'];
        $deleteRecords=$_POST['deleteRecords'];
        $selectRecords=$_POST['selectRecords'];
        $selectData=$_POST['selectData'];
        $selectValue=$_POST['selectValue'];
        $sqlQuery='';

	
		
		    if (isset($statemnt) && $statemnt=="insert") 
	          {
                echo "The statement selected: INSERT<br>";
                echo "The values entered by the user:<br>";
                echo $values;
                echo "<br>";
                echo "The executed sql statement is:<br>";
                $sqlQuery="INSERT into products VALUES".$values.";";
                echo $sqlQuery;
				}
                else if (isset($statemnt) && $statemnt=="update") 
                {
                  echo "The statement selected: UPDATE";
                  echo "The values entered by the user:";
                  echo "<br>";
                  echo $updateSql;
                  echo "<br>";
                  echo $updateValues;
                  echo "<br>";
                  echo "The executed sql statement is:<br>";
                  $sqlQuery="UPDATE products SET ".$updateSql."WHERE ".$updateValues.";";
                  echo $sqlQuery;
                  }
                  else if (isset($statemnt) && $statemnt=="delete") 
                {
                  echo "The statement selected: DELETE<br>";
                  echo "The values entered by the user:<br>";

                  echo $deleteRecords;
                  echo "<br>";
                  echo "The executed sql statement is:<br>";
                  $sqlQuery="DELETE FROM products WHERE ".$deleteRecords.";";
                  echo $sqlQuery;
                  }
                  else if (isset($statemnt) && $statemnt=="select") 
                  {
                    if (isset($selectRecords) && $selectRecords=="sRecords") 
                    {
                        echo "The statement selected: SELECT<br>";
                        echo "The values entered by the user:<br>";
      
                        echo $selectData;
                        echo "<br>";
                        echo $selectValue;
                        echo "<br>";
                        echo "The executed sql statement is:<br>";
                        $sqlQuery="SELECT ".$selectData." FROM products WHERE ".$selectValue.";";
                        echo $sqlQuery;
                        echo "<br>";

                       $dns = "mysql:host=localhost;dbname=w2021_php";
                       $db= new PDO($dns,'root','');
                       $returnSelectRecords=$db->query($sqlQuery);
                       echo "<br>";
                       echo "<h2>The Product Details:</h2>";

                       
                       while($rowArray=$returnSelectRecords->fetch())

                      {
                    
	                    print_r($rowArray);
	                    
	
                      }
                    }
                   else if (isset($selectRecords) && $selectRecords=="sAllRecords") 
                    {
                        echo "The statement selected: SELECT<br>";
                        echo "The executed sql statement is:<br>";
                        $sqlQuery="Select * from products;";
                        echo $sqlQuery;
                        echo "<br>";
                        $dns = "mysql:host=localhost;dbname=w2021_php";
                        $db= new PDO($dns,'root','');
                        $returnSelect=$db->query($sqlQuery);
                        echo "<br>";
                        echo "<h2>The Product Details:</h2>";
                        while($rowArray=$returnSelect->fetch())
    
    
                          {
                            echo $rowArray['ProductName']."\n";
                            print_r($rowArray);
                            
        
                          }
                    }


                    }
            }


             $dns = "mysql:host=localhost;dbname=w2021_php";
             $db= new PDO($dns,'root','');
             $resRows=$db->exec($sqlQuery);

	
?>