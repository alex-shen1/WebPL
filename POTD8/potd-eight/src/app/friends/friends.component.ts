import { Component, OnInit } from '@angular/core';

import { Friend } from '../friend';

@Component({
  selector: 'app-friends',
  templateUrl: './friends.component.html',
  styleUrls: ['./friends.component.css']
})
export class FriendsComponent implements OnInit {
  friend: Friend;
  friend2: Friend;

  manyfriends = [
   { name: 'Mickey', email: 'mickey@uva.edu' },
   { name: 'Minnie', email: 'minnie@uva.edu' },
   { name: 'duh', email: 'duh@uva.edu' },
   { name: 'huh', email: 'huh@uva.edu' }
  ];

  constructor() {
    this.friend = new Friend('Humpty', 'humpty@uva.edu');
    this.friend2 = new Friend('Dumpty', 'dumpty@uva.edu');
  }

  ngOnInit(): void {
  }

  changeDefaultName(str: string) {
    this.friend.name = str;
  }

}
