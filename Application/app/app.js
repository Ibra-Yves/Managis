import React, { Component } from 'react';
import {
	Image,
	StyleSheet,
} from 'react-native';

import { StackNavigator, DrawerNavigator, DrawerItems, NavigationEvents } from 'react-navigation';


import HomeScreen from './home.js';
import Login from './login.js';
import Register from './register.js';
import WhoIs from './whoIs.js';
import Profile from './profile.js';
import Restes from '../components/restes.js';
import CreateAnnonce from '../components/createAnnonce.js';
import AnnoncePerso from '../components/annoncePerso.js';
import Settings from '../components/settings.js';
import Evenement from '../components/evenement.js';
import ResteItem from '../components/resteItem.js'
import ResteItemPerso from '../components/resteItemPerso.js'
import EventFutur from '../components/eventFutur.js'
import Invitation from '../components/invitation.js'

import { Container, Content, Header, Body, Icon } from 'native-base'

const CustomDrawer = (props) => (
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

const RestesNav = StackNavigator({
	ListeRestes: {
		screen: Restes, 
		navigationOptions: {
			 
		} 
	}, 
	ResteItem: {
		screen: ResteItem
	}
})

const RestesPersoNav = StackNavigator({
	RestesPerso: {
		screen: AnnoncePerso,
		navigationOptions: {
			
		}
	},
	ResteItemPerso: {
		screen: ResteItemPerso,
		navigationOptions: {
			
		}
	}
})

const EventNav = StackNavigator({
	Evenement: {
		screen: Evenement
	},
	EventFutur: {
		screen: EventFutur
	},
	Invitation: {
		screen: Invitation
	}
})


const myNav = DrawerNavigator({
	Profile: {
		screen: Profile,
		navigationOptions: {
			title: 'Profil',
			
		}
	},
	Restes: {
		screen: RestesNav,
		navigationOptions: {
			title: 'Marché des Restes',
			
		}
	},
	CreateAnnonce: {
		screen: CreateAnnonce,
		navigationOptions: {
			title: 'Créer une annonce',
			
		}
	},

	AnnoncePerso: {
		screen: RestesPersoNav,
		navigationOptions: {
			title: 'Mes annonces',
			
		}
	},
	EvenementPerso: {
		screen: EventNav,
		navigationOptions: {
			title: 'Gestion des événements',
			
		}
	},
	Settings: {
		screen: Settings,
		navigationOptions: {
			title: 'paramètre',
			
		}
	},

}, {
	initialRouteName: 'Restes',
	contentComponent: CustomDrawer,
	drawerOpenRoute: 'DrawerOpen',
	drawerCloseRoute: 'DrawerClose',
	drawerToggleRoute: 'DrawerToggle',
	drawerPosition: 'right'
	

})


const Managis = StackNavigator({
	Home: {
		screen: HomeScreen,
		navigationOptions: {
			
		},
	},
	Login: {
		screen: Login,
		navigationOptions: {
			
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
			title: 'Qui sommes-nous ?',
			
		}
	},

	Drawer: {
		screen: myNav, 
		navigationOptions: {
			
		}
	}

});




const styles = StyleSheet.create({
	drawerImage: {
		height: 250,
		width: 250
	}

})




export default Managis;