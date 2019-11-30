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
import Restes from '../components/restes.js';
import CreateAnnonce from '../components/createAnnonce.js';
import AnnoncePerso from '../components/annoncePerso.js';


const myNav = DrawerNavigator({
	"Marchés des Restes": {screen: Restes},
	"Créer une annonce": {screen: CreateAnnonce},
	"Vos annonces": {screen: AnnoncePerso}
});


const Managis = StackNavigator({
	Home :{
		screen: HomeScreen,
		navigationOptions: () => ({
			header: null,
		}),
	},
	Login: {
		screen: Login,
		navigationOptions: {
		  title: 'Connexion'
		}
	  },

	Register: {
		screen: Register,
		navigationOptions: {
		  title: 'Inscription'
		}
	  },

	WhoIs: {
		screen: WhoIs,
		navigationOptions: {
		  title: 'Qui sommes-nous ?'
		}
	},

	Menu: {
		screen: Menu,
		navigationOptions: {
		  title: 'Menu'
		}
	},

	Profile: {
		screen: Profile,
		navigationOptions: {
		  title: 'Profil'
		}
	},

	Restes :{
		screen: myNav,
		navigationOptions: () => ({
			header: null,
		}),
	},

	CreateAnnonce: {
		screen: CreateAnnonce,
		navigationOptions: {
		  title: 'Créer une annonce'
		}
	},

	AnnoncePerso: {
		screen: AnnoncePerso,
		navigationOptions: () => ({
			header: null,
		}),
	}

 });

export default Managis;
