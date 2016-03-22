    <?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
                $this->load->model('timetable');
	}
        
        function index()
        {
            $timetable = new Timetable();
            $facetArray =  array();
            
            $this->load->helper('directory');
            //$candidates = directory_map(DATAPATH);
            $this->data['timetable'] = 'timetable';

            $this->data['pagebody'] = 'homepage';
            $this->data['days'] = $timetable->getDayCodes();
            $this->data['times'] = $timetable->getTimeslotCode();
            
            //$this->data['dump'] = var_dump($timetable->getTimeslots());
            
            foreach($timetable->getTimeslots() as $record){
		$bookings[] = array(
                    'facet' => 'Timeslot Facet',
                    'timeslot' => $record->getSlot(),
                    'course' => $record->getCourse(),
                    'day' => $record->getDay(),
                    'instructor' => $record->getInstructor(),
                    'room' => $record->getRoom(),
                    'classtype' => $record->getClassType()
                    );
            }
            
            foreach($timetable->getCourses() as $record){
		$bookings[] = array(
                    'facet' => 'Courses Facet',
                    'timeslot' => $record->getSlot(),
                    'course' => $record->getCourse(),
                    'day' => $record->getDay(),
                    'instructor' => $record->getInstructor(),
                    'room' => $record->getRoom(),
                    'classtype' => $record->getClassType()
                    );
            }
            
            foreach($timetable->getDays() as $record){
		$bookings[] = array(
                    'facet' => 'Days Facet',
                    'timeslot' => $record->getSlot(),
                    'course' => $record->getCourse(),
                    'day' => $record->getDay(),
                    'instructor' => $record->getInstructor(),
                    'room' => $record->getRoom(),
                    'classtype' => $record->getClassType()
                    );
            }
            
            $this->facetArray[] = array('facet'=>' ', 'bookings'=>$bookings);
            $this->data['facets'] = $this->facetArray;
            
            $this->render();
        }
        
        public function search()
        {
		$this->data['pagebody'] = 'searchresult';
		
		$day = $this->input->post('day');
		$slot = $this->input->post('time');
                
                $timetable = new Timetable();
		$daysSearch = $timetable->findBookingDay($day,$slot);
		$timesSearch = $timetable->findBookingTimeSlot($day,$slot);
		$coursesSearch = $timetable->findBookingCourse($day,$slot);
		if(count($daysSearch) == 1 && count($timesSearch) == 1 && count($coursesSearch) == 1)
                {
			$this->data['message'] = "Bingo!";
                        $this->data['day'] = $daysSearch[0]->getDay();
                        $this->data['timeslot'] = $daysSearch[0]->getSlot();
                        $this->data['course'] = $daysSearch[0]->getCourse();
                        $this->data['instructor'] = $daysSearch[0]->getInstructor();
                        $this->data['room'] = $daysSearch[0]->getRoom();
                        $this->data['classtype'] = $daysSearch[0]->getClassType();
	
		}
		else
                {
			$this->data['message'] = "Not bingo...";
                        $this->data['day'] = "";
                        $this->data['timeslot'] = "";
                        $this->data['course'] = "";
                        $this->data['instructor'] = "";
                        $this->data['room'] = "";
                        $this->data['classtype'] = "";
		}
		//$this->data['searchResult'] = $searchResult;
		$this->render();
	}
}
