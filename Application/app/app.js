import React, { Component } from 'react';
import { AppRegistry,
				View,
				Text,
				StyleSheet,
				ScrollView,
				TouchableOpacity } from 'react-native';
import { StackNavigator,DrawerNavigator } from 'react-navigation';


import HomeScreen from './home.js';
import Login from './login.js';
import Register from './register.js';
import Menu from './menu.js';
import WhoIs from './whoIs.js';
import Profile from './profile.js';
import EventList from '../components/eventList.js';
import EventDetails from '../components/eventDetails.js';
import EventItem from '../components/eventItem.js';
import Settings from '../components/settings.js';
import CreateEvent from '../components/createEvent.js';
import Invitation from '../components/invitation.js';
import Historique from '../components/historique.js';
import Restes from '../components/restes.js';

const myDrawer = DrawerNavigator({
	"Liste des événement": {screen: EventList},
	"Créer un événement": {screen: CreateEvent},
	"Vos invitations": {screen: Invitation},
	"Vos événements passés": {screen: Historique},
	"Marchés des Restes": {screen: Restes}
});

const Managis = StackNavigator({
	Home: { screen: HomeScreen },
	Login: { screen: Login },
	Register: {screen: Register},
	WhoIs: {screen: WhoIs},
	Menu: {screen: Menu},
	Profile: {screen: Profile},
	EventList: {screen: myDrawer},
	Settings: {screen: Settings}
 });

export default Managis;
