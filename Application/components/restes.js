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
        Alert,
        RefreshControl} from 'react-native';

import ListView from "deprecated-react-native-listview";

class Restes extends Component {
  static navigationOptions = {
    drawerIcon:(
      <Image source={require('../image/restes.png')}
      style={{height:24,width:24}}/>
    )
  }

  constructor(props) {
    super(props);
    this.state = {
      isLoading: true,
      refreshing: false,
      text:''
    }
     this.webCall();
     this.arrayholder = [] ;
  }

  webCall=()=>{

    return fetch('http://192.168.0.9/ManagisApp/DBRestes/restes.php')
      .then((response) => response.json())
      .then((responseJson) => {
        let ds = new ListView.DataSource({rowHasChanged: (r1, r2) => r1 !== r2});
        this.setState({
          isLoading: false,
          dataSource: ds.cloneWithRows(responseJson),
        }, function() {
          // In this block you can do something with new state.
          this.arrayholder = responseJson;
        });
      })
      .catch((error) => {
        console.error(error);
      });
  }

  SearchFilterFunction(text){

       const newData = this.arrayholder.filter(function(item){
           const itemData = item.nomReste.toUpperCase()
           const textData = text.toUpperCase()
           return itemData.indexOf(textData) > -1
       })
       this.setState({
           dataSource: this.state.dataSource.cloneWithRows(newData),
           text: text
       })
   }

  ListViewItemSeparator = () => {
    return (
      <View
        style={{
          height: 2,
          width: "100%",
          backgroundColor: "#3A4750"
        }}
      />
    );
  }

  onRefresh() {

   const ds = new ListView.DataSource({rowHasChanged: (r1, r2) => r1 !== r2});

   this.setState({dataSource : ds.cloneWithRows([ ])})

   this.webCall();

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
          <View style={{flex: 6, justifyContent: 'center'}}>
            <Text style={styles.titrePage}>Marché des Restes</Text>
          </View>
          </View>
          <View style={{flex : 1}}>
          <TouchableOpacity
                onPress={() => this.props.navigation.openDrawer('myNav')}
                style={{flex: 1, flexDirection: 'row-reverse', marginTop: -35}}>
                <Image
                  source={require('../image/icons8-menu-arrondi-50.png')}
                  style={styles.icon}
                  />
              </TouchableOpacity>
          </View>

      <View style={styles.MainContainer}>
       <TextInput
        style={styles.textinput}
        onChangeText={(text) => this.SearchFilterFunction(text)}
        value={this.state.text}
        placeholder='Rechercher des restes'
        placeholderTextColor='#FFFFFF'
         />

      <ListView

        dataSource={this.state.dataSource}

        renderSeparator= {this.ListViewItemSeparator}

        enableEmptySections = {true}

        renderRow={(rowData) =>

       <View style={{flex:1, flexDirection: 'column'}} >

         <Text style={styles.textViewContainer} >{'NOM DU RESTE: ' + '  ' + rowData.nomReste}</Text>

         <Text style={styles.textViewContainer} >{'QUANTITE DU RESTE: ' +  '  ' + rowData.quantiteReste}</Text>

         <Text style={styles.textViewContainer} >{'DESCRIPTION: ' + '  ' +  rowData.descriptionReste}</Text>

         <Text style={styles.textViewContainer} >{'ADRESSE:' + '  ' + rowData.adresse}</Text>

       </View>


        }
      />
      <TouchableOpacity onPress={() => this.props.navigation.navigate("CreateAnnonce")} style={styles.TouchableOpacityStyle} >

      <Image
        source={require('../image/Floating_Button.png')}
        style={styles.icon}
        />

        </TouchableOpacity>
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
  textViewContainer: {
 textAlignVertical:'center',
 padding:10,
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
   width:400,
   backgroundColor:'#3A4750',
   borderRadius: 15,
   paddingVertical:12,
   fontSize:16,
   color:'#FFFFFF',
   textAlign:'center'
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
 TouchableOpacityStyle:{
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
