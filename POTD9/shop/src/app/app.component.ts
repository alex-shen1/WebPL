import { Component } from '@angular/core';
import { Order } from './order';

import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  //dependency injection
  constructor(private http: HttpClient) {

  }

  title = 'Angular - backend, HttpClient';
  author = 'Jennifer Long (rz5sc), Alex Shen (as5gd)';

  drinks = ['Coffee', 'Tea', 'Milk'];

  confirm_msg = '';
  data_submitted = '';


  /* create an instance of an Order, assuming there is an existent order */
  /* we will bind orderModel to the form, allowing an update / delete transaction */
  /* orderModel = new Order('duh', 'duh@uva.edu', 1112223333, '', '', true); */
  orderModel = new Order('', '', null, '', '', null);


  confirmOrder(data: any): void {
     console.log(data);
     this.confirm_msg = 'Thank you, ' + data.name + '(' + data.name.length + ')';
     this.confirm_msg += '. You ordered ' + data.drink_option;
  }

  responsedata = new Order("", "", null, "", "", null);

  // passing in a form variable of type any, no return result
  onSubmit(form: any): void {
     console.log('You submitted value: ', form);
     this.data_submitted = form;

     // console.log(this.data_submitted, this.data_submitted.name.length);
     console.log('form submitted ', form);

     // prepare to send a request to the backend PHP
     // 1. convert the form data to JSON format
     let params = JSON.stringify(form);

     // 2. send an HTTP request to the backend,
     // get request or post request
     // sent a POST request
     // post<return_type>('url', data)
     this.http.post<Order>('target-url', params)
     .subscribe((response_from_php) => {
       // successful - use response in some way
       this.responsedata = response_from_php;
     }, (error_in_comm) => {
       // error occurs - handle it in some way
       console.log("Error: ", error_in_comm)
     })
  }

}
