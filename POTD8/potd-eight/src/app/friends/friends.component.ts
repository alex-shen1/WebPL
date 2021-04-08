import { Component, OnInit } from '@angular/core';

import { Friend } from '../friend';

@Component({
  selector: 'app-friends',
  templateUrl: './friends.component.html',
  styleUrls: ['./friends.component.css']
})
export class FriendsComponent implements OnInit {
  friendname: string;  // name property

  friend: Friend;
  friend2: Friend;

  constructor() {
    this.friendname = 'someone';

    this.friend = new Friend('Humpty', 'humpty@uva.edu');
    this.friend2 = new Friend('Dumpty', 'dumpty@uva.edu');
  }

  ngOnInit(): void {
  }

}
