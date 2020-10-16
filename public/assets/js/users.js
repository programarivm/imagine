import { config } from './config.js';
import { toQueryParams } from './api/helpers.js';

console.log('Just doing some tests...');

fetch('https://try2imagine.com/api/users/session')
  .then(response => response.json())
  .then(data => console.log(data));
