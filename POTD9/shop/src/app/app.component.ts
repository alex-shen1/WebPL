import { Component } from '@angular/core';
import { Order } from './order';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  title = 'Angular form activity';
  author = 'your name';

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

  // passing in a form variable of type any, no return result
  onSubmit(form: any): void {
     console.log('You submitted value: ', form);
     this.data_submitted = form;

     // console.log(this.data_submitted, this.data_submitted.name.length);
     console.log('form submitted ', form);
  }

}
