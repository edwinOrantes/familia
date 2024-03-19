<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Habitaciones extends CI_Controller {

    public function __construct(){
		parent::__construct();
		date_default_timezone_set('America/El_Salvador');
        $this->load->model("Habitaciones_Model");
		if (!$this->session->has_userdata('valido')){
			$this->session->set_flashdata("error", "Debes iniciar sesión");
			redirect(base_url());
		}
	}

    public function index(){
        $data["habitaciones"] = $this->Habitaciones_Model->obtenerHabitaciones();
        $this->load->view('Base/header');
		$this->load->view('Habitaciones/lista_habitaciones', $data);
		$this->load->view('Base/footer');
        // echo json_encode($data);
    } 

    public function guardar_habitacion(){
		$datos = $this->input->post();
		$bool = $this->Habitaciones_Model->guardarHabitacion($datos);
		if($bool){
			$this->session->set_flashdata("exito","Los datos fueron guardados con exito!");
			redirect(base_url()."Habitaciones/");
		}else{
			$this->session->set_flashdata("error","Hubo un error al guardar los datos!");
			redirect(base_url()."Habitaciones/");
		}
	
		// echo json_encode($datos);
    }

    public function actualizar_habitacion(){
        $datos = $this->input->post();
        $bool = $this->Habitaciones_Model->actualizarHabitacion($datos);
		if($bool){
			$this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
			redirect(base_url()."Habitaciones/");
		}else{
			$this->session->set_flashdata("error","Hubo un error al actualizar los datos!");
			redirect(base_url()."Habitaciones/");
		}

		// echo json_encode($datos);
    }

    public function eliminar_habitacion(){
        $datos = $this->input->post();
        $bool = $this->Habitaciones_Model->eliminarHabitacion($datos);
		if($bool){
			$this->session->set_flashdata("exito","Los datos fueron eliminados con exito!");
			redirect(base_url()."Habitaciones/");
		}else{
			$this->session->set_flashdata("error","Hubo un error al eliminar los datos!");
			redirect(base_url()."Habitaciones/");
		}

		// echo json_encode($datos);
    }
    
}
