
import 'package:flutter/material.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:http/http.dart' as http;
import 'package:learnenmet_sample/constants/constants.dart';
import 'dart:convert';
import 'package:learnenmet_sample/ui/widgets/customappbar.dart';
import 'package:learnenmet_sample/ui/widgets/responsive_ui.dart';
import 'package:learnenmet_sample/ui/widgets/textformfield.dart';

class Register extends StatefulWidget {

  final String emailController;
  final String passwordController;
  final String nameController;
  final String numberController;

  const Register({
    Key key,
    this.emailController,
    this.passwordController,
    this.nameController,
    this.numberController}) : super(key: key);


  @override
  _RegisterState createState() => _RegisterState();
}

class _RegisterState extends State<Register> {
  bool checkBoxValue = false;
  double _height;
  double _width;
  double _pixelRatio;
  bool _large;
  bool _medium;
  bool sigin = true;
  TextEditingController organizationController = TextEditingController();
  TextEditingController subjectController = TextEditingController();
  TextEditingController strong_subjectController = TextEditingController();
  TextEditingController experienceController = TextEditingController();
  TextEditingController ratingController = TextEditingController();
  bool processing =false;

  Future signUp() async{

    setState(() {
      processing = true;
    });
    var url = "http://192.168.43.53/project/register.php";
    var response = await http.post(url,body: {
      "full_name" : widget.nameController,
      "email" : widget.emailController,
      "password": widget.passwordController,
      "conf_pass":widget.numberController,
      "organization": organizationController.text,
      "subject" : subjectController.text,
      "strong_subject" : strong_subjectController.text,
      "experience" : experienceController.text,
      "rating" : ratingController.text
    });
    var data = json.decode(response.body);
    if(data == "Error"){
      Fluttertoast.showToast(
          msg: "Account Already exist,please login",
          toastLength: Toast.LENGTH_SHORT,
          gravity: ToastGravity.CENTER,
          timeInSecForIosWeb: 5,
          backgroundColor: Colors.red,
          textColor: Colors.white,
          fontSize: 16.0
      );
    }else {

      Fluttertoast.showToast(
          msg: "Account Created successfully",
          toastLength: Toast.LENGTH_SHORT,
          gravity: ToastGravity.CENTER,
          timeInSecForIosWeb: 5,
          backgroundColor: Colors.green,
          textColor: Colors.white,
          fontSize: 16.0);

    }
    setState(() {
      processing = false;
    });
    Navigator.of(context).pushNamed(SIGN_IN);
  }
  void initState() {
    // TODO: implement initState
    super.initState();
    organizationController = new TextEditingController();
    subjectController = new TextEditingController();
    strong_subjectController= new TextEditingController();
    experienceController  = new TextEditingController();
    ratingController = new TextEditingController();
  }

  @override
  Widget build(BuildContext context) {

    _height = MediaQuery.of(context).size.height;
    _width = MediaQuery.of(context).size.width;
    _pixelRatio = MediaQuery.of(context).devicePixelRatio;
    _large =  ResponsiveWidget.isScreenLarge(_width, _pixelRatio);
    _medium =  ResponsiveWidget.isScreenMedium(_width, _pixelRatio);
    return Material(
      child: Scaffold(
        body: Container(
          height: _height,
          width: _width,
          margin: EdgeInsets.only(bottom: 5),
          child: SingleChildScrollView(
            child: Column(
              children: <Widget>[
                Opacity(opacity: 0.88,child: CustomAppBar()),
                form(),
                SizedBox(height: _height / 60.0),
                button()
              ],
            ),
          ),
        ),
      ),
    );
  }
  Widget form() {
    return Container(
      margin: EdgeInsets.only(
          left:_width/ 12.0,
          right: _width / 12.0,
          top: _height / 20.0),
      child: Form(
        child: Column(
          children: <Widget>[
            organizationTextFormField(),
            SizedBox(height: _height / 60.0),
            subjectTextFormField(),
            SizedBox(height: _height / 60.0),
            strongSubjectTextFormField(),
            SizedBox(height: _height / 60.0),
            experianceTextFormField(),
            SizedBox(height: _height / 60.0),
            ratingTextFormField(),
          ],
        ),
      ),
    );
  }
  Widget organizationTextFormField() {
    return CustomTextField(
      keyboardType: TextInputType.text,
      textEditingController: organizationController,
      icon: Icons.contacts,
      hint: "Organization",
    );
  }

  Widget subjectTextFormField() {
    return CustomTextField(
      keyboardType: TextInputType.text,
      textEditingController: subjectController,
      icon: Icons.subject,
      hint: "Subject",
    );
  }

  Widget strongSubjectTextFormField() {
    return CustomTextField(
      keyboardType: TextInputType.text,
      textEditingController: strong_subjectController,
      icon: Icons.subject,
      hint: "Strong Subject",
    );
  }

  Widget experianceTextFormField() {
    return CustomTextField(
      keyboardType: TextInputType.number,
      textEditingController: experienceController,
      icon: Icons.person_add,
      hint: "Experiance",
    );
  }
  Widget ratingTextFormField() {
    return CustomTextField(
      keyboardType: TextInputType.number,
      textEditingController: ratingController,
      icon: Icons.rate_review,
      hint: "Rating",
    );
  }

  Widget button() {
    return RaisedButton(
      elevation: 0,
      shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(30.0)),
      onPressed: () {
        signUp();
        },
      textColor: Colors.white,
      padding: EdgeInsets.all(0.0),
      child: Container(
          alignment: Alignment.center,
//        height: _height / 20,
          width:_large? _width/4 : (_medium? _width/3.75: _width/3.5),
          decoration: BoxDecoration(
            borderRadius: BorderRadius.all(Radius.circular(20.0)),
            gradient: LinearGradient(
              colors: <Color>[Color(0xFF048C80), Color(0xFF048C80)],
            ),
          ),
          padding: const EdgeInsets.all(12.0),
          child: processing == false ? Text('Register', style: GoogleFonts.varelaRound(fontSize: 18.0,color: Colors.white),) : CircularProgressIndicator(backgroundColor: Colors.red,)

      ),
    );
  }


}