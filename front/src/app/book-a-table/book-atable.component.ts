import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-book-atable',
  templateUrl: './book-atable.component.html',
  styleUrls: ['./book-atable.component.scss']
})
export class BookATableComponent implements OnInit {

  startDate = new Date(2023, 7, 10);

  constructor() { }

  ngOnInit(): void {
  }

}
