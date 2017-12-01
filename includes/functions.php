<?php
  
   class Functions
   {	public function fetch_forgetdetails($email)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT name,mmid,password FROM register WHERE email = ?;");
			$query->bindValue(1,$email);
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_all_users()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM register;");
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_user($user)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM register WHERE mmid = ?;");
			$query->bindValue(1,$user);
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_total_mmids()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM register;");
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_mmids()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT MAX(mmid) as mmid FROM register;");
			$query->execute();
			return $query ->fetch();
		}
		public function checkeventname($id)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT rules FROM event_rules WHERE event_id = ?;");
			$query->bindValue(1,$id);
			$query->execute();
			return $query ->fetch();
		}
		public function checkcoordinator($id)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM event_coordinators WHERE event_id = ?;");
			$query->bindValue(1,$id);
			$query->execute();
			return $query ->fetchAll();
		}
		public function eventone($group)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM event_time WHERE groupid = ?;");
			$query->bindValue(1,$group);
			$query->execute();
			return $query ->fetchAll();
		}
		public function eventwithid($group)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM event_time WHERE id = ?;");
			$query->bindValue(1,$group);
			$query->execute();
			return $query ->fetchAll();
		}
		public function eventtwo($eventid)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM event_coordinators WHERE event_id = ?;");
			$query->bindValue(1,$eventid);
			$query->execute();
			return $query ->fetchAll();
		}
		public function eventthree($eventid)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM event_rules WHERE event_id = ?;");
			$query->bindValue(1,$eventid);
			$query->execute();
			return $query ->fetchAll();
		}
		public function event_coordinators($eventid)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM event_coordinators WHERE event_id = ?;");
			$query->bindValue(1,$eventid);
			$query->execute();
			return $query ->fetchAll();
		}
		public function displayallevents()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM event_time;");
			$query->execute();
			return $query ->fetchAll();
		}
		public function displayallcoordinators()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM event_coordinators;");
			$query->execute();
			return $query ->fetchAll();
		}
		public function departments()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM department;");
			$query->execute();
			return $query ->fetchAll();
		}
		public function departmentstitles($dept_id,$paperorposter)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM department_titles WHERE dept_id=? AND paperorposter=?;");
			$query->bindValue(1,$dept_id);
			$query->bindValue(2,$paperorposter);
			$query->execute();
			return $query ->fetchAll();
		}
   }
?>