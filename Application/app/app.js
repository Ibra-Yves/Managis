import React, { Component } from 'react';
import {
	AppRegistry,
	View,
	Text,
	Image,
	StyleSheet,
	ScrollView,
	TouchableOpacity,
	Styles
} from 'react-native';
import { StackNavigator, DrawerNavigator, DrawerItems } from 'react-navigation';


import HomeScreen from './home.js';
import Login from './login.js';
import Register from './register.js';
import Menu from './menu.js';
import WhoIs from './whoIs.js';
import Profile from './profile.js';
import Restes from '../components/restes.js';
import CreateAnnonce from '../components/createAnnonce.js';
import AnnoncePerso from '../components/annoncePerso.js';
import Settings from '../components/settings.js';
import Evenement from '../components/evenement.js';

import { Container, Content, Header, Body, Icon } from 'native-base'

const CustomDrower = (props) => (
	<Container>
		<Header style={{ height: 250 }}>
			<Body>
				<Image
					source={require('../image/logo_transparent.png')}
					style={styles.drawerImage}
				/>
			</Body>
		</Header>
		<Content>
			<DrawerItems {...props} />
		</Content>
	</Container>
)


const myNav = DrawerNavigator({
	Restes: {
		screen: Restes,
		navigationOptions: {
			title: 'Marché des Restes'
		}
	},
	CreateAnnonce: {
		screen: CreateAnnonce,
		navigationOptions: {
			title: 'Créer une annonce'
		}
	},

	AnnoncePerso: {
		screen: AnnoncePerso,
		navigationOptions: {
			title: 'Mes annonces'
		}
	},
	Evenement: {
		 	screen: Evenement,
			navigationOptions: {
				title: 'Gestion des événements'
			}
	},
	Settings: {
		screen: Settings,
		navigationOptions: {
			title: 'paramètre'
		}
	},

}, {
	initialRouteName: 'Restes',
	contentComponent: CustomDrower,
	drawerOpenRoute: 'DrawerOpen',
	drawerCloseRoute: 'DrawerClose',
	drawerToggleRoute: 'DrawerToggle'
})


const Managis = StackNavigator({
	Home: {
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

	Restes: {
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
const styles = StyleSheet.create({
	drawerImage: {
		height: 250,
		width: 250
	}

})


export default Managis;
