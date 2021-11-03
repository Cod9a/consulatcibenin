require('./bootstrap');
import Alpine from 'alpinejs'
import carteConsulaireDocumentForm from './components/carte-consulaire-document-form'
import meetingCreate from './components/meeting-create';
import calendar from './components/calendar';

Alpine.data('carteConsulaireDocumentForm', carteConsulaireDocumentForm);
Alpine.data('meetingCreate', meetingCreate);
Alpine.data('calendar', calendar);

Alpine.start()
