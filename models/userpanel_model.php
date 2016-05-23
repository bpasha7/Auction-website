<?php
class UserPanel_Model extends Model
{
    public function __construct()
    {
        //Session::init();
        //if(Session::get('Role'))
        //{
        parent::__construct();
        //}

    }
    public function about()
    {
    	Session::init();
            if(Session::get('loggedIn') == true)
            {
            $userid = Session::get('User');
            //How many items does user have
            $sth    = $this->database->prepare("SELECT COUNT(ItemId) AS cnt FROM items
                WHERE OwnerId = :userid");
            $sth->execute(array(
                    ':userid'=> $userid
                ));
            $data = $sth->fetch();
            $info_array ['itemcount'] = $data['cnt'];
			$sth->closeCursor();
            //How many lots does user have
            $sth = $this->database->prepare("SELECT COUNT(lots.ItemId) AS cnt FROM lots, items
                WHERE items.OwnerId = :userid AND lots.ItemId = items. ItemId");
            $sth->execute(array(
                    ':userid'=> $userid
                ));
            $data = $sth->fetch();
            $info_array ['lotcount'] = $data['cnt'];
            $sth->closeCursor();
            //User balance          
            $sth = $this->database->prepare("CALL MyBalance( :userid )");
            $sth->execute(array(
                    ':userid'=> $userid
                ));
            $data = $sth->fetch(PDO::FETCH_ASSOC);
            $info_array ['rub'] = $data['Rubles'];
            $info_array ['dol'] = $data['Dollars'];
            $info_array ['bon'] = $data['Bonuses'];            
            echo json_encode($info_array);
            $sth->closeCursor();
            }
            else
            {
				
			}
    }
     public function items()
    {
    	Session::init();
            if(Session::get('loggedIn') == true)
            {
            $userid = Session::get('User');
            //How many items does user have
            $sth    = $this->database->prepare("SELECT * FROM aboutitems WHERE OwnerId = :userid");
            $sth->execute(array(
                    ':userid'=> $userid
                ));
            $count= $sth->rowCount();
            if ($count > 0)
            {	
            echo "<tr>\n
					\t<td>Товар</td>\n
					\t<td>Группа</td>\n
					\t<td width=\"110\" class=\"ac\">Управление</td>\n";		
			$odd = 1;
            while($row = $sth->fetch(PDO::FETCH_LAZY))
            {
            	if($odd % 2 == 0)
            		echo "<tr>\n";
            	else
            		echo "<tr class=\"odd\">\n";
				echo 
					"\t<td><h3>".$row->ItemName."</h3></td>\n
					\t<td>".$row->GroupName."</td>\n
					\t<td><a href=\"#\" class=\"ico del\">Удалить</a>
					<a href=\"#\" class=\"ico lot\">Выставить</a>
					<a href=\"#\" class=\"ico edit\">Изменить</a></td></tr>\n";
					$odd++;	
			}
			//echo "</tbody>";
			}
			else
			{
				
			}
            	//$data[] = $row;                  
           // echo json_encode($data);
            $sth->closeCursor();
            }
            else
            {
			}
    }
    public function lots()
    {
    	Session::init();
            if(Session::get('loggedIn') == true)
            {
            $userid = Session::get('User');
            //How many items does user have
            $sth    = $this->database->prepare("SELECT * FROM userslots WHERE UserId = :userid");
            $sth->execute(array(
                    ':userid'=> $userid
                ));
            $count= $sth->rowCount();
            if ($count > 0)
            {	
            echo "<tr>\n
					\t<th>Лот</th>\n
					\t<th>Группа</th>\n
					\t<th>Цена</th>\n
					\t<th>Дата создания</th>\n
					\t<th>Тип</th>\n
					\t<th width=\"110\" class=\"ac\">Управление</th>\n";		
			$odd = 1;
            while($row = $sth->fetch(PDO::FETCH_LAZY))
            {
            	if($odd % 2 == 0)
            		echo "<tr>\n";
            	else
            		echo "<tr class=\"odd\">\n";
				echo 
					"\t<td><h3>".$row->ItemName."</h3></td>\n
					\t<td>".$row->Group."</td>\n
					\t<td>".$row->Price."</td>\n
					\t<td>".$row->Created."</td>\n
					\t<td>".$row->PrName."</td>\n
					\t<td><a href=\"#\" class=\"ico del\">Завершить</a>
					<a href=\"#\" class=\"ico edit\">Изменить</a></td></tr>\n";
					$odd++;	
			}
			//echo "</tbody>";
			}
			else
			{
				
			}
            	//$data[] = $row;                  
           // echo json_encode($data);
            $sth->closeCursor();
            }
            else
            {
				
			}
    }
}
?>