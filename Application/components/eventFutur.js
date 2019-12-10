import React, { Component } from 'react';

import {
  AppRegistry,
  Image,
  ScrollView,
  TextInput,
  TouchableOpacity,
  StyleSheet,
  Text,
  View,
  Alert,
  AsyncStorage,
  FlatList
} from 'react-native';


class EventFutur extends Component {

  constructor(props) {
    super(props)
    this.state = {
      UserName: [],
      data: [],
    }
  }

  //On récupère l'id de l'utilisateur connecté pour n'afficher que ses annonces.
  componentWillMount() {
    this._loadInitialState().done();
  }

  _loadInitialState = async () => {
    var value = await AsyncStorage.getItem('UserName');
    if (value !== null) {
      this.setState({ UserName: value });
    }
    this.recuperationDonneeEventPerso()
  }

  //on récupère les données sous forme de tableau qui sont envoyées par le fichier "restes.php" et on les met dans la variable data pour pouvoir les traiter.
  recuperationDonneeEventPerso = () => {

    fetch('http://192.168.1.10:8878/ManagisApp/ManagisApp/evenements/EventFutur.php', {
      method: 'POST',
      header: {
        'Accept': 'application/json',
        'Content-type': 'application/json'
      },
      body: JSON.stringify({
        userName: this.state.UserName,
      })

    })
      .then((response) => response.json())
      .then((responseJson) => {
        this.setState({ data: responseJson });
      })
      .catch((error) => {
        console.error(error);
      });
  }

  render(){
    return(
        <ScrollView>
            <FlatList
                data={this.state.data}
                keyExtractor={(item) => item.idEvent.toString()}
                renderItem={({ item }) => 
                    <Text>{item.nomEvent}</Text>}
                />
        </ScrollView>
    )
  }
}
export default EventFutur