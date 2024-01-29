import thunk from "redux-thunk";
import {createStore, combineReducers, applyMiddleware} from 'redux';
import {productReducer} from "./reducers/ProductReducer";
import {categoryReducer} from "./reducers/CategoryReducer";

export const middlewares = [thunk];

const rootReducer = combineReducers({
    productReducer: productReducer,
    categoryReducer: categoryReducer,
});

export const createStoreWithMiddleware = applyMiddleware(...middlewares)(createStore);

export const store = createStoreWithMiddleware(rootReducer)

export default store;
