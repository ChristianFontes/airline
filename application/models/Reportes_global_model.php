<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes_global_model extends CI_Model 
{
	 public function __construct()
	 {
		 parent::__construct();
	 }

	  public function reporte_por_edad()
	  {
		  	$this->load->database(); //Te permite utilizar la Base de datos


		  	$query = $this->db->query('
SELECT

(SELECT ((count(id)/(SELECT count(*) FROM pasajeroVuelo))*100) AS per15to25 
FROM pasajeroVuelo 
WHERE edad >=15 
AND edad <=25) AS per15to25  ,

(SELECT ((count(id)/(SELECT count(*) FROM pasajeroVuelo))*100) AS per26to35 
FROM pasajeroVuelo 
WHERE edad >=26 
AND edad <=35)  AS per26to35  ,

(SELECT ((count(id)/(SELECT count(*) FROM pasajeroVuelo))*100) AS per36to45  
FROM pasajeroVuelo 
WHERE edad >=36 
AND edad <=45) AS per36to45  ,

(SELECT ((count(id)/(SELECT count(*) FROM pasajeroVuelo))*100) AS per46yMas 
FROM pasajeroVuelo 
WHERE edad >=46) AS per46yMas 

		  		');
		  
			 	return $query;

	  }

	  public function reporte_edad_america()
	  {

		$this->load->database(); //Te permite utilizar la Base de datos

			$query = $this->db->query('

			SELECT

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo  ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'America\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=15 AND edad <=25) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 15a25America,

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo  ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'America\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=26 AND edad <=35) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 26a35America,

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo  ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'America\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=36 AND edad <=45) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 36a45America,

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'America\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=46) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 46yMasAmerica

			');
		  
			 return $query;

	  }

	   public function reporte_edad_europa()
	  {

		$this->load->database(); //Te permite utilizar la Base de datos

			$query = $this->db->query('

			SELECT

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo  ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'Europa\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=15 AND edad <=25) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 15a25Europa,

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo  ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'Europa\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=26 AND edad <=35) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 26a35Europa,

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo  ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'Europa\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=36 AND edad <=45) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 36a45Europa,

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'Europa\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=46) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 46yMasEuropa

			');
		  
			 return $query;

	  }

	  public function reporte_edad_africa()
	  {

		$this->load->database(); //Te permite utilizar la Base de datos

			$query = $this->db->query('

			SELECT

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo  ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'Africa\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=15 AND edad <=25) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 15a25Africa,

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo  ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'Africa\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=26 AND edad <=35) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 26a35Africa,

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo  ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'Africa\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=36 AND edad <=45) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 36a45Africa,

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'Africa\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=46) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 46yMasAfrica

			');
		  
			 return $query;

	  }

	  public function reporte_edad_asia()
	  {

		$this->load->database(); //Te permite utilizar la Base de datos

			$query = $this->db->query('

			SELECT

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo  ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'Asia\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=15 AND edad <=25) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 15a25Asia,

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo  ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'Asia\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=26 AND edad <=35) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 26a35Asia,

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo  ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'Asia\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=36 AND edad <=45) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 36a45Asia,

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'Asia\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=46) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 46yMasAsia

			');
		  
			 return $query;

	  }

	  public function reporte_edad_caribe()
	  {

		$this->load->database(); //Te permite utilizar la Base de datos

			$query = $this->db->query('

			SELECT

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo  ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'Caribe\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=15 AND edad <=25) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 15a25Caribe,

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo  ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'Caribe\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=26 AND edad <=35) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 26a35Caribe,

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo  ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'Caribe\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=36 AND edad <=45) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 36a45Caribe,

(SELECT ( (count(Vuelo.numVuelo)/(SELECT count(*) FROM pasajeroVuelo ))*100) 
AS 15a25America

FROM (SELECT numVuelo FROM centralVuelos WHERE sector LIKE \'Caribe\') AS Vuelo
JOIN (SELECT numVuelo FROM pasajeroVuelo WHERE edad >=46) AS Pasajero
ON Vuelo.numVuelo = Pasajero.numVuelo) AS 46yMasCaribe

			');
		  
			 return $query;

	  }

	   public function reporte_mujer()
	  {

		$this->load->database(); //Te permite utilizar la Base de datos

			$query = $this->db->query('

				SELECT CeV.destino,CeV.sector, SUM(Mu.Mujeres) AS Mujeres FROM centralVuelos AS CeV JOIN
			(SELECT numVuelo ,COUNT(numVuelo) AS Mujeres
			 FROM pasajeroVuelo
			  WHERE sexo like \'Mujer\' 
			  AND edad >= 25 
			  GROUP BY numVuelo 
			  ORDER BY Mujeres DESC ) AS Mu ON CeV.numVuelo = Mu.numVuelo
			  GROUP BY CeV.destino
			  ORDER BY Mu.Mujeres DESC 	LIMIT 1	
  		');
		  
			 return $query;

	  }

}


/* fin Reportes_global_model.php*/
