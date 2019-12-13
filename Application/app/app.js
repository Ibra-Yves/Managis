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
import Evenement from '../components/evenement.js';
import ResteItem from '../components/resteItem.js'
import ResteItemPerso from '../components/resteItemPerso.js'
import EventFutur from '../components/eventFutur.js'
import Invitation from '../components/invitation.js'
import EventDetails from '../components/eventDetails.js'
import InvitationDetails from '../components/invitationDetails.js'

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
			header: null
		}
	}, 
	ResteItem: {
		screen: ResteItem, 
		navigationOptions: {
			header: null
		}
	}
})

const RestesPersoNav = StackNavigator({
	RestesPerso: {
		screen: AnnoncePerso,
		navigationOptions: {
			header: null
		}
	},
	ResteItemPerso: {
		screen: ResteItemPerso,
		navigationOptions: {
			header: null
		}
	}
})

const EventNav = StackNavigator({
	Evenement: {
		screen: Evenement, 
		navigationOptions: {
			header: null
		}
	},
	EventFutur: {
		screen: EventFutur,
		navigationOptions: {
			header: null
		}
	},
	Invitation: {
		screen: Invitation,
		navigationOptions: {
			header: null
		}
	}, 
	EventDetails: {
		screen: EventDetails,
		navigationOptions: {
			header: null
		}
	},
	InvitationDetails: {
		screen: InvitationDetails,
		navigationOptions: {
			header: null
		}
	}
})


const myNav = DrawerNavigator({
	EvenementPerso: {
		screen: EventNav,
		navigationOptions: {
			header: null,
			title: 'Evénements & Invitations',
			drawerIcon: (
				<Image source={require('../image/calendar.png')}
				  style={{ height: 24, width: 24, color: 'black' }} />
			)
		}
	},
	Restes: {
		screen: RestesNav,
		navigationOptions: {
			header: null,
			title: 'Annonces de restes',
			drawerIcon: (
				<Image source={require('../image/search.png')}
				  style={{ height: 24, width: 24 }} />
			)
			
		}
	},
	CreateAnnonce: {
		screen: CreateAnnonce,
		navigationOptions: {
			header: null,
			title: 'Créez votre annonce',
			drawerIcon: (
				<Image source={require('../image/plus.png')}
				  style={{ height: 24, width: 24 }} />
			)
			
		}
	},

	AnnoncePerso: {
		screen: RestesPersoNav,
		navigationOptions: {
			header: null,
			title: 'Vos annonces',
			drawerIcon: (
				<Image source={require('../image/vosannonces.png')}
				  style={{ height: 24, width: 24 }} />
			)
			
		}
	},
	
	Profile: {
		screen: Profile,
		navigationOptions: {
			header: null,
			title : 'Votre profil',
			drawerIcon: (
				<Image source={require('../image/profil.png')}
				  style={{ height: 24, width: 24 }} />
			)
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
			header: null
		},
	},
	Login: {
		screen: Login,
		navigationOptions: {
			header: null
		}
	},

	Register: {
		screen: Register,
		navigationOptions: {
			header: null
		}
	},

	WhoIs: {
		screen: WhoIs,
		navigationOptions: {
			header: null
		}
	},

	Drawer: {
		screen: myNav, 
		navigationOptions: {
			header: null
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