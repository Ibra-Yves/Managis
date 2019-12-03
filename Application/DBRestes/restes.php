import React, { Component } from 'react';

import { AppRegistry,
        Image,
        ScrollView,
        TextInput,
        TouchableOpacity,
        StyleSheet,
        ActivityIndicator,
        Text,
        View,
        AsyncStorage,
        Alert } from 'react-native';

import ListView from "deprecated-react-native-listview";

class Restes extends Component {

  constructor(props) {
    super(props);
    this.state = {
      UserEmail: [],
      isLoading: true
    }
  }
GetItem (adresse,quantiteReste) {
  
  //on pourrait metre la description de l'annonce, quantité et adresse
  Alert.alert(adresse,quantiteReste);

  }


  componentDidMount() {

    this._loadInitialState().done();

    return fetch('http://192.168.1.34/ManagisApp/DBRestes/restes.php')
      .then((response) => response.json())
      .then((responseJson) => {
        let ds = new ListView.DataSource({rowHasChanged: (r1, r2) => r1 !== r2});
        this.setState({
          isLoading: false,
          dataSource: ds.cloneWithRows(responseJson),
        }, function() {
          // In this block you can do something with new state.
        });
      })
      .catch((error) => {
        console.error(error);
      });
  }

  _loadInitialState = async () => {
    var value = await AsyncStorage.getItem('UserEmail');
    if (value !==null) {
      this.setState({UserEmail: value});
    }

  }

  ListViewItemSeparator = () => {
    return (
      <View
        style={{
          height: .5,
          width: "100%",
          backgroundColor: "#3A4750",
        }}
      />
    );
  }


  render() {
    if (this.state.isLoading) {
      return (
        <View style={{flex: 1, paddingTop: 20}}>
          <ActivityIndicator />
        </View>
      );
    }

    return (

      <ScrollView>
        <View style={styles.containerTitre}>
		<TouchableOpacity
          onPress={() => this.props.navigation.navigate("Menu")}
          style={{flex: 1, alignItems: 'center', justifyContent: 'center'}}>
          <Image
            source={require('../image/icons8-gauche-50.png')}
            style={styles.icon}
            />
        </TouchableOpacity>

          <View style={{flex: 6, justifyContent: 'center'}}>
            <Text style={styles.titrePage}>Marché des restes</Text>
          </View>
          </View>
          <View style={{flex : 1}}>
          <TouchableOpacity
                onPress={() => this.props.navigation.openDrawer('myNav')}
                style={{flex: 1, flexDirection: 'row-reverse', marginTop: -40}}>
                <Image
                  source={require('../image/icons8-menu-arrondi-50.png')}
                  style={styles.icon}
                  />
              </TouchableOpacity>
          </View>
        <View style={{margin: 5, alignItems: 'center'}}>
          <TextInput
            style={styles.textinput}
            placeholder='Rechercher des restes'
            placeholderTextColor='#FFFFFF'
          />
          <View>
            <TouchableOpacity style={{flexDirection: 'row'}}>
              <Image
                source={require('../image/icons8-chercher-50.png')}
                style={styles.iconSearch}/>
              <Text style={styles.searchText}>Rechercher</Text>
            </TouchableOpacity>
          </View>
      <View style={styles.MainContainer}>

        <ListView

          dataSource={this.state.dataSource}

          renderSeparator= {this.ListViewItemSeparator}

          renderRow={(rowData) => <Text style={styles.rowViewContainer}

          onPress={this.GetItem.bind(this, rowData.adresse ,rowData.quantiteReste ,rowData.descriptionReste)} >{rowData.nomReste} {this.state.UserEmail}</Text>}
          
        />
      </View>
      </View>
      </ScrollView>
    );
  }
}

const styles = StyleSheet.create({

MainContainer :{

justifyContent: 'center',
flex:1,
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
   width:300,
   backgroundColor:'#3A4750',
   borderRadius: 25,
   paddingVertical:12,
   fontSize:16,
   color:'#FFFFFF',
   textAlign:'center',
   marginVertical: 10
 },

containerTitre: {
    backgroundColor:'#3A4750',
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

});

export default Restes
