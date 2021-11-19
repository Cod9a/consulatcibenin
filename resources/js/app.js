require('./bootstrap');
import Alpine from 'alpinejs'
import carteConsulaireDocumentForm from './components/carte-consulaire-document-form'
import meetingCreate from './components/meeting-create';
import calendar from './components/calendar';
import customSelect from './components/custom-select';

Alpine.data('carteConsulaireDocumentForm', carteConsulaireDocumentForm);
Alpine.data('meetingCreate', meetingCreate);
Alpine.data('calendar', calendar);
Alpine.data('customSelect', customSelect);

Alpine.start()
