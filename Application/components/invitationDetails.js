import React, { Component } from 'react'

import { Text, StyleSheet, View, TouchableOpacity, FlatList, ScrollView, Image, SafeAreaView } from 'react-native'


class InvitationDetails extends Component {

    constructor(props) {
        super(props)
        this.state = {
            onPressedInvites: false,
            onPressedFournitures: false,
            onPressedCommentaires: false,
            onPressedParticipe: true,
            invites: [],
            fournitures: [],
            commentaires: []
        }
        this.handlerButtonOnPressInvites = this.handlerButtonOnPressInvites.bind(this)
        this.handlerButtonOnPressFournitures = this.handlerButtonOnPressFournitures.bind(this)
        this.handlerButtonOnPressCommentaires = this.handlerButtonOnPressCommentaires.bind(this)

    }

    afficherInvite() {
        fetch('https://managis.be/GestionApp/takeInvite.php', {
        //fetch('http://localhost:8878/ManagisApp/ManagisApp/evenements/takeInvite.php', {
            method: 'POST',
            header: {
                'Accept': 'application/json',
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                idEvent: this.event.idEvent,
            })

        })
            .then((response) => response.json())
            .then((responseJson) => {
                this.setState({ invites: responseJson });
            })
            .catch((error) => {
                console.error(error);
            });
    }

    afficherCommentaire() {
        fetch('https://managis.be/GestionApp/takeCommentaire.php', {
        //fetch('http://localhost:8878/ManagisApp/ManagisApp/evenements/takeCommentaire.php', {
            method: 'POST',
            header: {
                'Accept': 'application/json',
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                idEvent: this.event.idEvent,
            })

        })
            .then((response) => response.json())
            .then((responseJson) => {
                this.setState({ commentaires: responseJson });
            })
            .catch((error) => {
                console.error(error);
            });
    }

    afficherFourniture() {
        fetch('https://managis.be/GestionApp/takeFourniture.php', {
        //fetch('http://localhost:8878/ManagisApp/ManagisApp/evenements/takeFourniture.php', {
            method: 'POST',
            header: {
                'Accept': 'application/json',
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                idEvent: this.event.idEvent,
            })

        })
            .then((response) => response.json())
            .then((responseJson) => {
                this.setState({ fournitures: responseJson });
            })
            .catch((error) => {
                console.error(error);
            });
    }

    handlerButtonOnPressInvites() {
        this.afficherInvite()
        if (this.state.onPressedInvites == false) {
            this.setState({
                onPressedInvites: true,
                onPressedFournitures: false,
                onPressedCommentaires: false
            })
        } else {
            this.setState({
                onPressedInvites: false,
                onPressedFournitures: false,
                onPressedCommentaires: false
            })
        }
    }

    handlerButtonOnPressFournitures() {
        this.afficherFourniture()
        if (this.state.onPressedFournitures == false) {
            this.setState({
                onPressedFournitures: true,
                onPressedInvites: false,
                onPressedCommentaires: false
            })
        } else {
            this.setState({
                onPressedInvites: false,
                onPressedFournitures: false,
                onPressedCommentaires: false
            })
        }
    }

    handlerButtonOnPressCommentaires() {
        this.afficherCommentaire()
        if (this.state.onPressedCommentaires == false) {
            this.setState({
                onPressedCommentaires: true,
                onPressedInvites: false,
                onPressedFournitures: false
            })
        } else {
            this.setState({
                onPressedInvites: false,
                onPressedFournitures: false,
                onPressedCommentaires: false
            })
        }
    }

    traductionDate(date) {
        ret = ''
        year = date.substring(0, 4)
        month = date.substring(5, 7)
        day = date.substring(8, 10)
        switch (month) {
            case '01':
                month = 'Janvier'
                break
            case '02':
                month = 'Février'
                break
            case '03':
                month = 'Mars'
                break
            case '04':
                month = 'Avril'
                break
            case '05':
                month = 'Mai'
                break
            case '06':
                month = 'Juin'
                break
            case '07':
                month = 'Juillet'
                break
            case '08':
                month = 'Août'
                break
            case '09':
                month = 'Septembre'
                break
            case '10':
                month = 'Octobre'
                break
            case '11':
                month = 'Novembre'
                break
            case '12':
                month = 'Décembre'
                break
        }

        ret = ret.concat(day, ' ', month, ' ', year)
        return ret
    }

    traductionPartcicipe(participe) {
        ret = ''
        if (participe == 1) {
            ret = 'Vous participez'
            this.setState.onPressedParticipe = true
            
        } else {
            ret = 'Vous ne participez pas'
            this.setState.onPressedParticipe = false
            
        }
        return ret
    }

    event = this.props.navigation.state.params.event

    


    render() {



        var _styleInvites
        var _styleFournitures
        var _styleCommentaires
        var _styleButtonParticipation
        var _styleButtonAnnulation

        if (this.state.onPressedParticipe == true) {
            _styleButtonParticipation = {
                display: 'none'
            }
            _styleButtonAnnulation = {
                display: 'flex'
            }
        } else if (this.state.onPressedParticipe == false) {
            _styleButtonParticipation = {
                display: 'flex'
            }
            _styleButtonAnnulation = {
                display: 'none'
            }
        }

        if (this.state.onPressedInvites) {
            _styleInvites = {
                display: 'flex'
            }
        } else {
            _styleInvites = {
                display: 'none'
            }
        }

        if (this.state.onPressedFournitures) {
            _styleFournitures = {
                display: 'flex'
            }
        } else {
            _styleFournitures = {
                display: 'none'
            }
        }

        if (this.state.onPressedCommentaires) {
            _styleCommentaires = {
                display: 'flex'
            }
        } else {
            _styleCommentaires = {
                display: 'none'
            }
        }

        return (
            <SafeAreaView style={{ flex: 1 }}>
                <ScrollView>
                    <View style={{ flex: 1 }}>
                        <View style={styles.containerTitre}>
                            <TouchableOpacity
                                onPress={() => this.props.navigation.goBack()}
                                style={{ flex: 1, alignItems: 'center', justifyContent: 'center' }}>
                                <Image
                                    style={{ width: 30, height: 30 }}
                                    source={require('../image/icons8-gauche-50.png')} />
                            </TouchableOpacity>
                            <View style={{ flex: 6, justifyContent: 'center' }}>
                                <Text style={styles.titre}>{this.event.nomEvent}</Text>
                            </View>
                            <View style={{ flex: 1 }}>
                            </View>
                        </View>
                        <View style={styles.containerTitreDate}>
                            <Text style={styles.titre2}>Date de l'événement: </Text>
                        </View>
                        <Text style={styles.text}>{this.traductionDate(this.event.dateEvent)}</Text>
                        <View style={styles.containerTitre2}>
                            <Text style={styles.titre2}>Heure de l'événement: </Text>
                        </View>
                        <View>
                            <Text style={styles.text}>{this.event.heure}</Text>
                        </View>
                        <View style={styles.containerTitre2}>
                            <Text style={styles.titre2}>Lieu de l'événement: </Text>
                        </View>
                        <Text style={styles.text}>{this.event.adresse}</Text>
                        <Text style={styles.text}>{this.traductionPartcicipe(this.event.participe)}</Text>

                        <View style={{ flexDirection: 'row', flex: 1 }}>
                            <TouchableOpacity
                                style={styles.choix}
                                onPress={() => this.handlerButtonOnPressInvites()}>
                                <Text style={{ color: '#FFFFFF', fontSize: 16 }}>Invités</Text>
                            </TouchableOpacity>
                            <TouchableOpacity
                                style={styles.choix}
                                onPress={() => this.handlerButtonOnPressFournitures()}>
                                <Text style={{ color: '#FFFFFF', fontSize: 16 }}>Fournitures</Text>
                            </TouchableOpacity>
                            <TouchableOpacity
                                style={styles.choix}
                                onPress={() => this.handlerButtonOnPressCommentaires()}>
                                <Text style={{ color: '#FFFFFF', fontSize: 16 }}>Commentaires</Text>
                            </TouchableOpacity>
                        </View>
                        <View style={_styleInvites}>
                            <Text style={{ textAlign: 'center', fontSize: 16, margin: 6, justifyContent: 'center', color: "#3A4750" }}>Liste des invités</Text>
                            <FlatList
                                data={this.state.invites}
                                renderItem={({ item }) =>
                                    <View style={{ borderColor: '#3A4750', borderWidth: 2, borderRadius: 25, margin: 3, marginLeft: 6, marginRight: 6, padding: 2, flexDirection: 'row', height: 50, justifyContent: 'center', alignItems: 'center' }}>
                                       
                                        <View style={{ justifyContent: 'center', alignItems: 'center' }}>
                                            <Text style={{ textAlign: 'center', color: '#3A4750' }}>{item.pseudo}</Text>
                                        </View>
                                    </View>}
                            />
                        </View>
                        <View style={_styleFournitures}>
                            <Text style={{ textAlign: 'center', fontSize: 16, margin: 6, color: "#3A4750", justifyContent: 'center' }}>Liste des fournitures</Text>
                            <FlatList
                                data={this.state.fournitures}
                                extraData={this.state.fourniture}
                                renderItem={({ item }) =>
                                    <View style={{ borderColor: '#3A4750', borderWidth: 2, borderRadius: 25, margin: 3, marginLeft: 6, marginRight: 6, padding: 2, height: 50, flexDirection: 'row', justifyContent: 'center' }}>
                                        <View style={{ flex: 1 }}>
                                        </View>
                                        <View style={{ flex: 3, justifyContent: 'center' }}>
                                            <View>
                                                <Text style={{ textAlign: 'left', color: '#3A4750' }}>Nom : {item.fourniture}</Text>
                                            </View>
                                            <View>
                                                <Text style={{ textAlign: 'left', color: '#3A4750' }}>Quantité : {item.quantite}</Text>
                                            </View>
                                        </View>
                                    </View>}
                            />

                        </View>
                        <View style={_styleCommentaires}>
                            <Text style={{ textAlign: 'center', fontSize: 16, margin: 6, justifyContent: 'center', color: "#3A4750" }}>Commentaires</Text>
                            <FlatList
                                data={this.state.commentaires}
                                renderItem={({ item }) =>
                                <View style={{ borderColor: '#3A4750', borderWidth: 2, borderRadius: 25, margin: 3, marginLeft: 6, marginRight: 6, padding: 2, flexDirection: 'row', height: 50, justifyContent: 'center', alignItems: 'center' }}>
                                       
                                <View style={{ justifyContent: 'center', alignItems: 'center' }}>
                                    <Text style={{ textAlign: 'center', color: '#3A4750' }}>{item.commentaire}</Text>
                                </View>
                            </View>}
                            />
                        </View>
                    </View>
                </ScrollView>
            </SafeAreaView>
        )
    }
}
const styles = StyleSheet.create({
    titre: {
        color: '#FFFFFF',
        fontSize: 18,
        textAlign: 'center'
    },
    containerTitre: {
        backgroundColor: '#3A4750',
        flexDirection: 'row',
        height: 60
    },
    titre2: {
        color: '#FFFFFF',
        fontSize: 25,
        textAlign: 'center'
    },
    containerTitre2: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
        backgroundColor: '#3A4750',
        marginLeft: 8,
        marginRight: 8,
        borderRadius: 25,
        height: 40
    },
    containerTitreDate: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
        backgroundColor: '#3A4750',
        margin: 8,
        marginBottom: 0,
        borderRadius: 25,
        height: 40
    },
    text: {
        color: '#3A4750',
        fontSize: 18,
        textAlign: 'center',
        paddingBottom: 10,
        paddingTop: 10,
        justifyContent: 'center',
    },
    choix: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
        borderRadius: 25,
        backgroundColor: '#3A4750',
        alignItems: 'center',
        padding: 5,
        margin: 4
    },
    invites: {
        display: 'flex'
    }
})
export default InvitationDetails