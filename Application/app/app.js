import React, { Component } from 'react';
import { AppRegistry,
				View,
				Text,
				StyleSheet,
				ScrollView,
				TouchableOpacity } from 'react-native';
import { StackNavigator } from 'react-navigation';

import HomeScreen from './home.js';
import Login from './login.js';
import Register from './register.js';
import Profile from './profile.js';
import WhoIs from './whoIs.js';

const Managis = StackNavigator({
	Home: { screen: HomeScreen },
	Login: { screen: Login },
	Register: {screen: Register},
	WhoIs: {screen: WhoIs},
	Profile: {screen: Profile}

 });

export default Managis;
