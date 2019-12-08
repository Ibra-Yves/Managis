import React, { Component } from 'react';

import {
  AppRegistry,
  Image,
  ScrollView,
  TextInput,
  TouchableOpacity,
  StyleSheet,
  ActivityIndicator,
  Text,
  View,
  Alert,
  RefreshControl,
  AsyncStorage
} from 'react-native';

import ListView from "deprecated-react-native-listview";

class Restes extends Component {
  static navigationOptions = {
    drawerIcon: (
      <Image source={require('../image/restes.png')}
        style={{ height: 24, width: 24 }} />
    )
  }

  constructor(props) {
    super(props)
    this.state = {
      UserId: [],
      data: [],
    }
  }

  //On récupère l'id de l'utilisateur connecté pour ne pas afficher ses annonces car il s'en fou de les voir.
  componentDidMount() {
    this._loadInitialState().done();
  }

  _loadInitialState = async () => {
    var value = await AsyncStorage.getItem('UserId');
    if (value !== null) {
      this.setState({ UserId: value });
    }
  }

  //on récupère les données sous forme de tableau qui sont envoyées par le fichier "restes.php" et on les met dans la variable data pour pouvoir les traiter.
  recuperationDonneeAnnonce = () => {

    fetch('http://192.168.1.10:8878/ManagisApp/ManagisApp/DBRestes/restes.php', {
      method: 'POST',
      header: {
        'Accept': 'application/json',
        'Content-type': 'application/json'
      },
      body: JSON.stringify({
        userId: this.state.UserId,
      })

    })
      .then((response) => response.json())
      .then((responseJson) => {
        this.setState({ data: responseJson });
        alert(this.state.data);
      })
      .catch((error) => {
        console.error(error);
      });
  }



  render() {
    return (

      <ScrollView>
        <View style={styles.containerTitre}>
          <View style={{ flex: 6, justifyContent: 'center' }}>
            <Text style={styles.titrePage}>Marché des Restes</Text>
          </View>
        </View>
        <View style={{ flex: 1 }}>
          <TouchableOpacity
            onPress={() => this.props.navigation.openDrawer('myNav')}
            style={{ flex: 1, flexDirection: 'row-reverse', marginTop: -35 }}>
            <Image
              source={require('../image/icons8-menu-arrondi-50.png')}
              style={styles.icon}
            />
          </TouchableOpacity>
        </View>





        <View>
          <TouchableOpacity
            onPress={this.recuperationDonneeAnnonce}
            style={styles.submitButton}>
            <Text style={{ color: 'black', textAlign: 'center' }}>Voir restes</Text>
          </TouchableOpacity>
        </View>
        <View>
          <TouchableOpacity onPress={() => this.props.navigation.navigate("CreateAnnonce")} style={styles.TouchableOpacityStyle} >
            <Image
              source={require('../image/Floating_Button.png')}
              style={styles.icon}
            />
          </TouchableOpacity>
        </View>
        {/*
        <View>
          <Text>{this.state.data[1][1]}</Text>
        </View>*/}
      </ScrollView >

    );
  }
}

const styles = StyleSheet.create({

  MainContainer: {

    justifyContent: 'center',
    flex: 1,
    margin: 10

  },

  titrePage: {
    color: '#FFFFFF',
    fontSize: 18,
    textAlign: 'center'
  },
  annonce: {
    alignItems: 'center',
    fontSize: 16,

  },
  textViewContainer: {
    textAlignVertical: 'center',
    padding: 10,
    fontSize: 15,
    fontWeight: 'bold'
  },

  icon: {
    width: 30,
    height: 30
  },

  iconSearch: {
    width: 20,
    height: 20,
    margin: 2
  },

  textinput: {
    width: 400,
    backgroundColor: '#3A4750',
    borderRadius: 15,
    paddingVertical: 12,
    fontSize: 16,
    color: '#FFFFFF',
    textAlign: 'center'
  },

  containerTitre: {
    backgroundColor: '#3A4750',
    flexDirection: 'row',
    height: 60
  },

  rowViewContainer: {
    fontSize: 20,
    paddingRight: 10,
    paddingTop: 10,
    paddingBottom: 10,
  },

  searchText: {
    alignItems: 'center',
    fontSize: 16,
    color: '#3A4750'
  },
  TouchableOpacityStyle: {
    position: 'absolute',
    width: 50,
    height: 50,
    alignItems: 'center',
    justifyContent: 'center',
    right: 30,
    bottom: 30
  },
  FloatingButtonStyle: {
    width: 100,
    height: 100,
  }

});

export default Restes