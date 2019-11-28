EventList = () => {
    const {UsernomEvent,UserHote,Useradresse,UserdateEvent} = this.state;

    fetch('http://10.99.1.13/ManagisApp/DBEvent/listeEvent.php',{
      method:'POST',
      header:{
        'Accept': 'application/json',
        'Content-type': 'application/json'
      },
      body:JSON.stringify({

        nomEvent: UsernomEvent,
        hote: UserHote,
        adresse: Useradresse,
        dateEvent: UserdateEvent
      })

    })
    .then((response) => response.json())
     .then((responseJson)=>{

       this.props.navigation.navigate("EventDetails", {idEvent: idEvent});
     }
   }
