import { Component, OnInit } from '@angular/core';
import { FormControl } from '@angular/forms';


@Component({
  selector: 'app-book-atable',
  templateUrl: './book-atable.component.html',
  styleUrls: ['./book-atable.component.scss']
})
export class BookATableComponent implements OnInit {

  startDate = new Date(2023, 7, 10);
  selectedDate = new FormControl(this.startDate);

  constructor() { }

  ngOnInit(): void {
  }

}
