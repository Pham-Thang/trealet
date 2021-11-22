import * as ActionTypes from '../action-types';

const defaultUser = {
  id: null,
  name: null,
  email: null,
};

const initialState = {
  isAuthenticated: false,
  user: defaultUser,
};

const authLogin = (state, payload) => {
    return state;
};

const checkAuth = (state) => {
  return state;
};

const logout = (state) => {
    return state;
};

const Auth = (state = initialState, { type, payload = null }) => {
  switch (type) {
    case ActionTypes.AUTH_LOGIN:
      return authLogin(state, payload);
    case ActionTypes.AUTH_CHECK:
      return checkAuth(state);
    case ActionTypes.AUTH_LOGOUT:
      return logout(state);
    default:
      return state;
  }
};

export default Auth;
