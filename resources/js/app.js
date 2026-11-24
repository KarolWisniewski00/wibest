import './bootstrap';
import { createReportPager } from './report-pager';
window.wibestReportPager = createReportPager;
import { installSearchMemory } from './search-memory';
installSearchMemory();
import { objectMaps } from './object-maps';
import { objectList } from './object-list';
import { objectPreview } from './object-preview';

window.wibestObjectMaps = objectMaps;
window.wibestObjectList = objectList;
window.wibestObjectPreview = objectPreview;
