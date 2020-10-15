import { toQueryParams } from './api/helpers.js';

console.log('Hello! Just running some first tests...');

console.log(toQueryParams({
  code: 'f',
  refresh_token: 'o',
  grant_type: 'o',
  redirect_uri: 'b',
  client_id: 'a',
}));
