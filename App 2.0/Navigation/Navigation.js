import React from 'react'
import { StyleSheet, Image, View, TouchableOpacity, Text } from 'react-native'
import { createStackNavigator } from 'react-navigation-stack'
import { createAppContainer } from 'react-navigation'
import { createBottomTabNavigator } from 'react-navigation-tabs'
import { createDrawerNavigator } from 'react-navigation-drawer'
import ConnexionInscription from '../Components/ConnexionInscription'
import Quid from '../Components/Quid'
import CreateEvent from '../Components/CreateEvent'
import EventList from '../Components/EventList'
import Invitation from '../Components/Invitation'
import Restes from '../Components/Restes'
import Historique from '../Components/Historique'
import EventDetails from '../Components/EventDetails'
import EventItem from '../Components/EventItem'
import CreateAnnonce from '../Components/CreateAnnonce'
import AnnoncePerso from '../Components/AnnoncePerso'
import Settings from '../Components/Settings'
import AjoutInvites from '../Components/AjoutInvites'
import AjoutFournitures from '../Components/AjoutFournitures'
import AjoutCommentaires from '../Components/AjoutCommentaires'


class DrawerMenu extends React.Component {
  render() {
    return (
      <View>
        <View style={{justifyContent: 'center', alignItems: 'center'}}>
          <Image
            source={require('../Images/logo_transparent.png')}
            style={{height: 200, width: 200}}
            />
        </View>
        <View>
          <TouchableOpacity
            onPress={() => this.props.navigation.navigate("EventList")}
            style={styles.drawerItem}
            >
            <Text style={styles.drawerText}>Liste des événements</Text>
          </TouchableOpacity>
          <TouchableOpacity
            onPress={() => this.props.navigation.navigate("CreateEvent")}
            style={styles.drawerItem}
            >
            <Text style={styles.drawerText}>Créer un événement</Text>
          </TouchableOpacity>
          <TouchableOpacity
            onPress={() => this.props.navigation.navigate("Invitation")}
            style={styles.drawerItem}
            >
            <Text style={styles.drawerText}>Vos invitations</Text>
          </TouchableOpacity>
          <TouchableOpacity
            onPress={() => this.props.navigation.navigate("Historique")}
            style={styles.drawerItem}
            >
            <Text style={styles.drawerText}>Vos événements passés</Text>
          </TouchableOpacity>
          <TouchableOpacity
            onPress={() => this.props.navigation.navigate("Restes")}
            style={styles.drawerItem}
            >
            <Text style={styles.drawerText}>Marché des restes</Text>
          </TouchableOpacity>
          <TouchableOpacity
            onPress={() => this.props.navigation.navigate("CreateAnnonce")}
            style={styles.drawerItem}
            >
            <Text style={styles.drawerText}>Créer votre annonce</Text>
          </TouchableOpacity>
          <TouchableOpacity
            onPress={() => this.props.navigation.navigate("AnnoncePerso")}
            style={styles.drawerItem}
            >
            <Text style={styles.drawerText}>Vos annonces</Text>
          </TouchableOpacity>
          <TouchableOpacity
            onPress={() => this.props.navigation.navigate("Settings")}
            style={styles.drawerItem}
            >
            <Text style={styles.drawerText}>Paramètres</Text>
          </TouchableOpacity>
        </View>
      </View>


    )
  }
}


const EventStackNav = createStackNavigator({
  EventList: {
    screen: EventList,
    navigationOptions : {
      headerShown: false
    }
  },
  EventDetails: {
    screen: EventDetails,
    navigationOptions: {
      title: "Détails de l'événement",
      headerShown: false
    }
  },
  AjoutInvites: {
    screen: AjoutInvites,
    navigationOptions: {
      headerShown: false
    }
  },
  AjoutFournitures: {
    screen: AjoutFournitures,
    navigationOptions: {
      headerShown: false
    }
  },
  AjoutCommentaires: {
    screen: AjoutCommentaires,
    navigationOptions: {
      headerShown: false
    }
  }
})

const EventDrawerNav = createDrawerNavigator({
  EventList: {
    screen: EventStackNav,
    navigationOptions: {
      title: 'Liste des événements'
    }
  },
  CreateEvent: {
    screen: CreateEvent,
    navigationOptions: {
      title: 'Créer un événement'
    }
  },
  Invitation: {
    screen: Invitation,
    navigationOptions: {
      title: 'Vos invitations'
    }
  },
  Historique: {
    screen: Historique,
    navigationOptions: {
      title: 'Vos événements passés'
    }
  },
  Restes: {
    screen: Restes,
    navigationOptions: {
      title: 'Marché des restes'
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
      title:'Vos annonces'
    }
  },
  Settings: {
    screen: Settings,
    navigationOptions: {
      title: 'Paramètres'
    }
  }
},
{
  contentComponent: DrawerMenu,
  drawerPosition: 'right'
})

const ConnexionInscriptionStackNavigator = createStackNavigator({
  ConnexionInscription: {
    screen: ConnexionInscription,
    navigationOptions: {
      title: 'Connexion/Inscription',
      headerShown: false
    }
  },
  EventList: {
    screen: EventDrawerNav,
    navigationOptions: {
      headerShown: false
    }
  }
})


const QuidStackNavigator = createStackNavigator({
  Quid: {
    screen: Quid,
    navigationOptions: {
      title: "Qui sommes nous ?",
      headerShown: false
    }
  }
})




const ManagisTabNavigator = createBottomTabNavigator({
  ConnexionInscription: {
    screen: ConnexionInscriptionStackNavigator,
    navigationOptions: {
      tabBarIcon: () => {
        return <Image
          source={require('../Images/icons8-connexion-50.png')}
          style={styles.icon}/>
      }
    }
  },
  Quid: {
    screen: QuidStackNavigator,
    navigationOptions: {
      tabBarIcon: () => {
        return <Image
          source={require('../Images/icons8-question-50.png')}
          style={styles.icon}/>
      }
    }
  },
}, {
  tabBarOptions: {
    showLabel: false,
    showIcon: true,
    activeBackgroundColor: '#DDDDDD',
    inactiveBackgroundColor: '#FFFFFF'
  }
})

const styles= StyleSheet.create({
  icon: {
    width: 30,
    height: 30
  },
  drawerItem: {
    backgroundColor: '#3A4750',
     alignItems: 'flex-start',
     margin: 5,
     padding: 3
  },
  drawerText: {
    fontSize: 20,
    color: '#FFFFFF'
  }
})

export default createAppContainer(ManagisTabNavigator)
