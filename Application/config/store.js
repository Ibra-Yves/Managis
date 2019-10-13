import { createStore, appliMiddleware } from 'redux';

import reducers from "../reducers"

let store = createStore(reducers,  {}, appliMiddleware());

