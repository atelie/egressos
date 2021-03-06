<?php
App::uses("Reservation", "Model");

class ReservationTest extends CakeTestCase{
	
	public $fixtures = array('app.reservation', 'app.user');

	public function setUp() {
		parent::setUp();
        $this->Reservation = ClassRegistry::init('Reservation');
    }

    function testReservationDateShouldBeRequired(){
		$this->Reservation->set(array('Reservation' => array()));
		$this->assertTrue($this->Reservation->validates());
	}

	function testReservationDateShouldNotBeEmpty(){
		$this->Reservation->set(array('Reservation' => array('data_reserva' => '', 'horario_reserva_1' => 1, 
			'horario_reserva_2' => 1, 'user_id' => 1)));
		$this->assertFalse($this->Reservation->validates());
	}

	function testReservationDateShouldBeInPortugueseFormat(){		
		$reserva = array('Reservation' => array('data_reserva' => '15/02/2002', 'horario_reserva_1' => 1, 
			'horario_reserva_2' => 1, 'user_id' => 1));
		$this->Reservation->set($reserva);
		$this->assertTrue($this->Reservation->validates());

		$reserva = array('Reservation' => array('data_reserva' => '2002-02-14', 'horario_reserva_2' => 1, 
			'horario_reserva_2' => 1, 'user_id' => 1));
		$this->Reservation->set($reserva);
		$this->assertFalse($this->Reservation->validates());
	}

	function testReservationShouldConvertsDataReservaToDatabaseFormatBeforeSave() {
		$reserva = array('Reservation' => array('data_reserva' => '15/02/2002'));
		$this->Reservation->set($reserva);
		$this->Reservation->beforeSave();
		$this->assertEquals('2002-02-15', $this->Reservation->data['Reservation']['data_reserva']);
	}

	function testReservationHorarioReservaUmShouldBeBoolean() {
		$this->Reservation->set(array('Reservation' => array('horario_reserva_1' => 1, 'horario_reserva_2' => 1)));
		$this->assertTrue($this->Reservation->validates());
	}

	function testReservationHorarioReservaUmShouldNotBeString() {
		$this->Reservation->set(array('Reservation' => array('horario_reserva_1' => 'risos')));
		$this->assertFalse($this->Reservation->validates());
	}

	function testReservationHorarioReservaDoisShouldBeBoolean() {
		$this->Reservation->set(array('Reservation' => array('horario_reserva_2' => 1, 'horario_reserva_1' => 1)));
		$this->assertTrue($this->Reservation->validates());
	}

	function testReservationHorarioReservaDoisShouldNotBeString() {
		$this->Reservation->set(array('Reservation' => array('horario_reserva_2' => 'risos')));
		$this->assertFalse($this->Reservation->validates());
	}

	function testReservationDateHorarioUmHorarioDoisChecked(){
		$reserva = array('data_reserva' => '20/07/2013', 'horario_reserva_1' => 1, 'horario_reserva_2' => 1, 
			'user_id' => 1);
		$this->Reservation->set(array('Reservation' => $reserva));
		$this->assertTrue($this->Reservation->validaDataHorario($reserva));
	}

	function testReservationDateHorarioUmHorarioDoisShouldNotBeEmpty(){
		$reserva = array('data_reserva' => '20/07/2013', 'horario_reserva_1' => 0, 'horario_reserva_2' => 0, 
			'user_id' => 1);
		$this->Reservation->set(array('Reservation' => $reserva));
		$this->assertFalse($this->Reservation->validaDataHorario($reserva));
	}

	function testReservationDateHorarioUmUnique(){
		$reserva = array('data_reserva' => '23/07/2013', 'horario_reserva_1' => 1, 'horario_reserva_2' => 0, 
			'user_id' => 1);
		$this->Reservation->set(array('Reservation' => $reserva));
		$this->assertFalse($this->Reservation->validaDataHorario($reserva));
	}

	function testReservationDateHorarioDoisUnique(){
		$reserva = array('data_reserva' => '23/07/2013', 'horario_reserva_1' => 0, 'horario_reserva_2' => 1, 
			'user_id' => 1);
		$this->Reservation->set(array('Reservation' => $reserva));
		$this->assertFalse($this->Reservation->validaDataHorario($reserva));
	}

	function testReservationDateHorarioUmEDoisLimitChecked(){
		$reserva = array('data_reserva' => '25/07/2013', 'horario_reserva_1' => 1, 'horario_reserva_2' => 1, 
			'user_id' => 1);
		$this->Reservation->set(array('Reservation' => $reserva));
		$this->assertTrue($this->Reservation->validaDataHorario($reserva));
	}

	function testReservationDateHorarioUmMenorOuIgualALimite(){
		$reserva = array('data_reserva' => '27/07/2013', 'horario_reserva_1' => 1, 'horario_reserva_2' => 0, 
			'user_id' => 1);
		$this->Reservation->set(array('Reservation' => $reserva));
		$this->assertFalse($this->Reservation->validaDataHorario($reserva));
	}

	function testReservationDateHorarioUmMaiorQueLimite(){
		$reserva = array('data_reserva' => '27/07/2013', 'horario_reserva_1' => 1, 'horario_reserva_2' => 0, 
			'user_id' => 1);
		$this->Reservation->set(array('Reservation' => $reserva));
		$this->assertFalse($this->Reservation->validaDataHorario($reserva));
	}

	function testReservationLimitEachUser(){
		$reserva = array('data_reserva' => '27/07/2013', 'horario_reserva_1' => 1, 'horario_reserva_2' => 0, 
			'user_id' => 1);
		$this->Reservation->set(array('Reservation' => $reserva));
		$this->assertFalse($this->Reservation->validaDataHorario($reserva));
	}

	function testConsultaListaReservasPorData(){

		$data_consulta = array('data_reserva' => '23/07/2013', 'horario_reserva_1' => 1, 'horario_reserva_2' => 0);

		$expected = array( 
						array('Reservation' =>
							array(
					        	'id' => 1, 
					        	'data_reserva' => '2013-07-23', 
					        	'horario_reserva_1' => '19:25', 
					        	'horario_reserva_2' => '21:05', 
					        	'user_id' => 1
					        ),
							'User' => array(
									'nome' => 'João da Silva'
							)
						)
					);

        $result = $this->Reservation->consultaListaReservasPorData($data_consulta);

        $this->assertEquals($expected, $result);
	}
	
}

?>
